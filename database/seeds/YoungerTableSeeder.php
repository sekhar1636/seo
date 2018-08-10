<?php

use Illuminate\Database\Seeder;

class YoungerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Younger::truncate();
        $time = \Carbon\Carbon::now();
        $data = [
            [
            'business' => '<p>Applause Theatrical Workshops<br>	
      Different classes in different age groups<br>	
      New York, NY<br>	
      </p>',
            'link' => 'http://www.applauseny.com',
            'button_text' => 'Visit Now',
            'created_at' => $time,
            'updated_at' => $time,
        ],[
                'business' => '<p>Belvoir Terrace<br>	
        Performing Arts Camp for Girls<br>	
        Lenox, MA<br></p>',
                'link' => 'http://www.belvoirterrace.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'business' => '<p>Brown Ledge<br>	
        Girls 10-18<br>	
        Colchester, VT<br>	
       </p>	',
                'link' => 'http://www.brownledge.org',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'business' => '<p>Bucks Rock Camp<br>	
        Ages 12-16<br>	
        Performing arts emphasized<br>	
        New Milford, CT<br>	
        </p>',
                'link' => 'http://www.bucksrockcamp.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>Brant Lake Dance Center<br>	
        For teenage girls<br>	
        Brant Lake, NY<br>	
       </p>	',
                'link' => 'http://www.blcdance.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>Camp Broadway<br>	
        100 children, ages 10-17<br>	
        5 day summer camp in New York City<br>	
       </p>	',
                'link' => 'http://www.campbroadway.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>Bucks Rock Camp<br>	
        Ages 12-16<br>	
        Performing arts emphasized<br>	
        New Milford, CT<br>	
        </p>',
                'link' => 'http://www.bucksrockcamp.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>Camp Rim Rock<br>	
        Girls ages 7-17<br>	
        Performing Arts &amp; Horseback Riding<br>	
        Yellow Springs, WV<br>	
        </p>',
                'link' => 'http://www.camprimrock.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>French Woods <br>	
        Performing Arts Camp, ages 7-17<br>	
        Hancock, NY<br>	
       </p>	',
                'link' => 'http://www.frenchwoods.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>Hidden Valley Camp<br>	
        Freedom, ME<br>	
        </p>	',
                'link' => 'http://www.hiddenvalleycamp.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>Long Lake Camp for the Arts<br>	
        Coed, ages 10-16<br>	
        Long Lake, NY<br>	
      </p>',
                'link' => 'http://www.longlakecamp.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>New England Music Camp<br>	
        Coed, ages 11-18<br>	
        Sidney, ME<br>	
        </p>',
                'link' => 'http://www.nemusiccamp.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>New York Film Academy<br>	
        Musical Theatre Summer Camp for Teens<br>	
        Acting Camp for Kids<br>	
        Additional camp programs in Film, Screenwriting, 3D Animation, Broadcast Journalism, and Game Design<br>	
        New York, NY<br>	
        </p>',
                'link' => 'http://www.nyfa.edu/summer-camps/',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>Sports and Arts Center<br>	
        Coed, ages 7-17<br>	
        Starrucca, Pa (at Island Lake)<br>	
       </p>	',
                'link' => 'http://www.islandlake.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>Stagedoor Manor<br>	
        Performing arts training - ages 8-18<br>	
        Theater, dance, voice, TV, modeling<br>	
        Loch Sheldrake, NY <br>	
        </p>',
                'link' => 'http://www.stagedoormanor.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],[
                'business' => '<p>Theatre Arts Center NY<br>	
        Performing Arts Training - ages 8-19<br>	
        Housing and Local<br>	
        New York, NY<br>	
        </p>',
                'link' => 'http://www.theatreartscenter.com',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'business' => '<p>Walnut Hill School of the Arts<br>	
        Summer Theater Program<br>	
        (they offer a dance program as well)<br>	
        Natick, MA<br>	
        </p>',
                'link' => 'http://www.walnuthillarts.org',
                'button_text' => 'Visit Now',
                'created_at' => $time,
                'updated_at' => $time,
            ],
        ];

        \App\Younger::insert($data);
    }
}
