<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Faq::class, function (Faker\Generator $faker) {
    return [
        'question' => $faker->sentence,
        'answer'=> $faker->paragraph,
		'_type'=>$faker->randomElement($array = array ("Application","Selection","Members","Audition"))
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role'=>'actor',
        'payment_status'=>'1'
    ];
});

$factory->define(App\Actor::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName($gender = null|'male'|'female'),
        'last_name' => $faker->lastName($gender = null|'male'|'female'),
        'age' => $faker->numberBetween($min = 10, $max = 100),
        'gender' => $faker->randomElement($array = array ('Male','Female')) ,
       	'feet'=>$faker->numberBetween($min = 1, $max = 8),
        'inch'=>$faker->numberBetween($min = 1, $max = 12),
       	'hair'=>$faker->randomElement($array = array ('Black','Brown')),
       	'eyes'=>$faker->randomElement($array = array ('Black','Brown')),
       	'weight'=>$faker->numberBetween($min = 70, $max = 400),
       	'photo_url' => $faker->imageUrl($width = 200, $height = 200),
        'from'=> $faker->date($format = 'Y-m-d'),
        'to'=>$faker->date($format='Y-m-d'),

       	'school'=>$faker->word,
       	'auditionType'=>$faker->randomElement($array = array ('Monologue Only','Song & Monologue','Dancer Who Sings')),

       	'vocalRange'=>$faker->randomElement($array = array ('Soprano','Mezzo','Alto','Tenor','Baritone')),

       	'jobType'=>$faker->randomElement($array = array ('Apprentice','Intern',		
		'Employment Availability')) ,

       	'dance'=>$faker->randomElement($array = array ('Ballet','Ballroom','Tap','Swing',		
		'Jazz')) ,
       	'technical'=>$faker->randomElement($array = array ('Set Design','Lights','Costume',
		'Box Office','Props')) ,
       	'ethnicity'=>$faker->randomElement($array = array ('Native Amer','Asian','White_Caucasian','Black_African Amer','Hispanic',
		'European','Middle Eastern',		
		'Indian')) ,
       	'instrument'=>$faker->randomElement($array = array ('Perc','Sax','Banjo','Piano','Drums','Cello','Clarinet',		
		'Trombone','Trumpet',		
		'Flute','Violin',		
		'Guitar')) ,
       	'misc'=>$faker->randomElement($array = array ('Shakes','Cabaret','Improv','Mime','Standup','Acrobatics','Juggling','Puppetry','Asl','Painting','Combat')) ,

        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});