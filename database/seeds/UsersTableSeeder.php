<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
        		['name' => 'safri adam','email'=>'safri.adam@gmail.com','password'=>Hash::make('secret')],
        		['name' => 'adam adam','email'=>'adam.adam@gmail.com','password'=>Hash::make('secret')],
        		['name' => 'safri safri','email'=>'safri.safri@gmail.com','password'=>Hash::make('secret')],
        		['name' => 'adam safri','email'=>'adam.safri@gmail.com','password'=>Hash::make('secret')],
        	);
        //perulangan untuk seed ke database
        foreach ($users as $user)
        {
        	User::create($user);
        }
    }
}
