<?php

namespace App\Http\Controllers\MainAPI;

use Illuminate\Http\Request;
use App\Http\Controllers\MainAPI\BaseAPIController as BaseController;
use App\Models\User;
use App\Models\Person;
use App\Models\Position;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Resources\TaskResource as TaskResource;

class TaskAPIController extends BaseController
{
    //

    public static function loadCurrentUser(){
        return User::join("persons","persons.id","=","users.person_id")
            ->where("users.id", "=", Auth::id())
            ->select("users.id", "employee_id", "person_id", "lastname", "firstname")
            ->first();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_name' => 'required',
            'description' => 'required',
            'assign_to' => 'required',
            'taskid' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $task = Task::find($request->taskid);

        if($task){
            $task->task_name = $request->task_name??$task->task_name;
            $task->description = $request->description??$task->description;
            $task->assign_to = $request->assign_to??$task->assign_to;
            if($task->save()){
                $success['task_name'] =  $task->task_name; 
                $success['date_updated'] = date("M d Y H:m:s");

                return $this->sendResponse($success, 'Task successfully updated.');
            }
            else{
                return $this->sendError('Server Error.', "Failed to update Task");  
            }
        }
        else{
            return $this->sendError('Server Error.', "Task not found");  
        }
    }

    public function destroy($id){
        $task = Task::find($id);
        if($task){
            $taskname = $task->task_name;
            if($task->delete()){

                    $success['task'] =  $taskname;
                    $success['date_deleted'] = date("M d Y H:m:s");

                    return $this->sendResponse($success, 'task successfully deleted.');
                }
                else{
                    return $this->sendError('Server Error.', "Failed to delete task");  
                }
        }
        else{
            return $this->sendError('Server Error.', "Task not found");  
        }
    }

    public function store(Request $request)
    {
        $current_user = TaskAPIController::loadCurrentUser();

        $validator = Validator::make($request->all(), [
            'task_name' => 'required',
            'description' => 'required',
            'assign_to' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $task = Task::create([
            'task_name' => ($request->task_name??''),
            'description' => ($request->description??''),
            'assign_to' => ($request->assign_to??0),
            'created_by' => $current_user->employee_id??0,
            'status' => 1,
        ]);

        if($task){
            $success['task'] =  $task->task_name; 
            $success['description'] =  $task->description;
            $success['assign_by'] =  $current_user->firstname . " " . $current_user->lastname; 
            $success['date_added'] = date("M d Y H:m:s");

            return $this->sendResponse($success, 'Task successfully added.');
        }
        else{
            return $this->sendError('Server Error.', "Failed to add task");  
        }
    }
   
    public function index()
    {
        $current_user = TaskAPIController::loadCurrentUser();

        $users = \DB::table("tasks")

        ->join("employees as assign_to","assign_to.id","=","tasks.assign_to")
        ->join("persons as person_assign_to","person_assign_to.id","=","assign_to.person_id")

        ->join("employees as assign_by","assign_by.id","=","tasks.created_by")
        ->join("persons as person_assign_by","person_assign_by.id","=","assign_by.person_id")
        ->join("task_statuses","task_statuses.id","=","tasks.status")

        ->where('tasks.created_by',"=", $current_user->employee_id)

        ->select("tasks.id", "task_name","description", 
            \DB::raw('concat(person_assign_to.firstname," ",person_assign_to.lastname) as assign_to'), 
            \DB::raw('concat(person_assign_by.firstname," ",person_assign_by.lastname) as assign_by'), 
            "tasks.created_at",
            "status_name as status"
        )
        ->orderBy("tasks.created_at", "desc")
        ->get();
    
        return $this->sendResponse(TaskResource::collection($users), 'Tasks retrieved successfully.');
    }

    public function assigned_task()
    {
        $current_user = TaskAPIController::loadCurrentUser();

        $task = \DB::table("tasks")

        ->join("employees as assign_to","assign_to.id","=","tasks.assign_to")
        ->join("persons as person_assign_to","person_assign_to.id","=","assign_to.person_id")

        ->join("employees as assign_by","assign_by.id","=","tasks.created_by")
        ->join("persons as person_assign_by","person_assign_by.id","=","assign_by.person_id")
        ->join("task_statuses","task_statuses.id","=","tasks.status")
        ->where('tasks.assign_to',"=", $current_user->employee_id)

        ->select("tasks.id", "task_name","description", 
            \DB::raw('concat(person_assign_to.firstname," ",person_assign_to.lastname) as assign_to'), 
            \DB::raw('concat(person_assign_by.firstname," ",person_assign_by.lastname) as assign_by'), 
            "tasks.created_at",
            "status_name as status"
        )
        ->orderBy("tasks.created_at", "desc")
        ->get();
    
        return $this->sendResponse(TaskResource::collection($task), 'Tasks retrieved successfully.');
    }

    public function show($id)
    {
        $current_user = TaskAPIController::loadCurrentUser();

        $task = Task::find($id);
        if (is_null($task)) {
            return $this->sendError('Task not found.');
        }
        else{
            $task = \DB::table("tasks")

            ->join("employees as assign_to","assign_to.id","=","tasks.assign_to")
            ->join("persons as person_assign_to","person_assign_to.id","=","assign_to.person_id")

            ->join("employees as assign_by","assign_by.id","=","tasks.created_by")
            ->join("persons as person_assign_by","person_assign_by.id","=","assign_by.person_id")
            ->where('tasks.id',"=", $id)

            ->select("tasks.id", "task_name","description", 
                //\DB::raw('concat(person_assign_to.firstname," ",person_assign_to.lastname) as assign_to'), 
                //\DB::raw('concat(person_assign_by.firstname," ",person_assign_by.lastname) as assign_by'), 
                "assign_to",
                "created_by as assign_by",
                "tasks.created_at",
                "tasks.status"
            )
            ->get();
                return $this->sendResponse(TaskResource::collection($task), 'Task retrieved successfully.');
        }
    }

    public function update_task_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'taskid' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $task = Task::find($request->taskid);

        if($task){
            $task->status = $request->status??$task->status;
            if($task->save()){
                $success['task_name'] =  $task->task_name; 
                $success['date_updated'] = date("M d Y H:m:s");

                return $this->sendResponse($success, 'Task status successfully updated.');
            }
            else{
                return $this->sendError('Server Error.', "Failed to update Task status");  
            }
        }
        else{
            return $this->sendError('Server Error.', "Task not found");  
        }
    }

}
