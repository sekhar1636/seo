<?php

use Illuminate\Database\Seeder;

class ContentPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\ContentPage::truncate();
		for($i=1; $i<=5; $i++){
			$contentPage = new \App\ContentPage;
			$contentPage->title = "Sample page $i title";
			$contentPage->description = "Laravel includes a simple method of seeding your database with test data using seed classes. All seed classes are stored in the database/seeds directory. Seed classes may have any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc. By default, a  DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.";
			$contentPage->save();
		}
    }
}
