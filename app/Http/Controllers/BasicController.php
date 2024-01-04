<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Helpers\Http;
use Illuminate\Support\Facades\Route;
use Session;
use GuzzleHttp\Client;

use App\Models\Person;
use App\Models\Employee;
use Validator;

class BasicController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout','logoutget', 'home'
        ]);
    }


    public function register()
    {
        return view('register');
    }

    public function sendError($error, $errorMessages = [], $code = 404){
        $response = [
            'success' => false,
            'message' => $error,
        ];
        
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|email|max:250',
            'password' => 'required|min:1'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $person = Person::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname
        ]);

        $emp = Employee::create([
            'person_id' => $person->id
        ]);

        User::create([
            'person_id' => $person->id??0,
            'email' => $request->email,
            'employee_id' => $emp->id??0,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        $user = Auth::user(); 
        Session::put('sess_token2', $user->createToken('MyApp')->accessToken);

        return redirect()->route('home')
        ->withSuccess('You have successfully registered & logged in!');
    }


    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = Auth::user(); 
            $mytoken = $user->createToken('MyApp2')->accessToken;

            Session::put('sess_token2', $mytoken);

            /*return redirect()->route('home')
                ->withSuccess('You have successfully logged in!');*/
                echo $mytoken;
        }

        return back()->withError('Your provided credentials do not match in our records.');

    } 
    

    public function home(Request $request)
    {
        if(Auth::check())
        {
            $response = \App::call('App\Http\Controllers\MainAPI\TaskAPIController@index');
            $data = json_decode($response->getContent(), true);

            $assign_task_response = \App::call('App\Http\Controllers\MainAPI\TaskAPIController@assigned_task');
            $assign_task_data = json_decode($assign_task_response->getContent(), true);

            return view('maindashboard', compact("data", "assign_task_data"));
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    } 

    public function logoutget(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }    
}
