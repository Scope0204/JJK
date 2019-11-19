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
        App\User::create([

            'name' => '조준경',
            'birth' => '97-02-04',
            'number' => '010-2541-4940',
            'email' => 'scope0204@naver.com',
            'password' => bcrypt('1234'),
            'photo' => '/photo/고양스.jpg',
        ]);

        App\User::create([     
        'name' => '서은우',
        'birth' => '95-07-06',
        'number' => '010-4197-4198',
        'email' => 'rmsidsha@naver.com',
        'password' => bcrypt('1234'),
        'photo' => '/photo/고양스.jpg'
        ]);
    }
}
