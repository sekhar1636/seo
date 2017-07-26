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
        $actorCount = \App\User::where('email', 'actor@actor.com')->count();
        if($actorCount == 0){
        	$actor = new \App\User;
        	$actor->name = "actor";
        	$actor->email = "actor@actor.com";
        	$actor->password = bcrypt('pass1234');
        	$actor->role = 'actor';
        	$actor->save();
        }
         $staffCount = \App\User::where('email', 'staff@staff.com')->count();
        if($staffCount == 0){
        	$staff = new \App\User;
        	$staff->name = "actor";
        	$staff->email = "staff@staff.com";
        	$staff->password = bcrypt('pass1234');
        	$staff->role = 'staff';
        	$staff->save();
        }
         $theaterCount = \App\User::where('email', 'theater@theater.com')->count();
        if($theaterCount == 0){
        	$theater = new \App\User;
        	$theater->name = "theater";
        	$theater->email = "theater@theater.com";
        	$theater->password = bcrypt('pass1234');
        	$theater->role = 'theater';
        	$theater->save();
        }
		$adminCount = \App\User::where('email', 'admin@admin.com')->count();
        if($theaterCount == 0){
        	$theater = new \App\User;
        	$theater->name = "Administrator";
        	$theater->email = "admin@admin.com";
        	$theater->password = bcrypt('pass1234');
        	$theater->role = 'admin';
        	$theater->save();
        }
    }
}
