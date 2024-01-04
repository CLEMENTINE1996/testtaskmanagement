<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $emp1 = DB::table('persons')->insertGetId([
            'firstname' => "John",
            'lastname' => 'Doe',
        ]);

         DB::table('users')->insert([
            'person_id' => $emp1,
            'usertype_id' => 1,
            'email' => 'manager@gmail.com',
            'password' => Hash::make('1234'),
        ]);

         $emp2 = DB::table('persons')->insertGetId([
            'firstname' => "Brian",
            'lastname' => 'Doe',
        ]);


         DB::table('users')->insert([
            'person_id' => $emp2,
            'usertype_id' => 2,
            'email' => 'webdeveloper@gmail.com',
            'password' => Hash::make('1234'),
        ]);

          $emp3 = DB::table('persons')->insertGetId([
            'firstname' => "Kim",
            'lastname' => 'Doe',
        ]);

         DB::table('users')->insert([
            'person_id' => $emp3,
            'usertype_id' => 3,
            'email' => 'webdesigner@gmail.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
