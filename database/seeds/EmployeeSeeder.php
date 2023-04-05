<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\User;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$user = User::create([
					'name' => 'John',
					'email' => 'john@gmail.com',
					'password' => \Hash::make('john'),
					'api_token' =>  Str::random(60),
				]);

    	$user->assignRole(1);

        Employee::create([
			'name' => 'John',
			'employee_code' => 'EMP_001',
			'dob' => '1997-01-12',
			'phone' => '09250206903',
			'photo' => 'kaung.jpg',
			'position_id' => '1',
			'user_id' => '1',
		]);
    }
}
