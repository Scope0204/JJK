<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(config('database.default')!=='sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0'); // 7장의 내용 참고 
        }

        // Model::unguard();   //mass assignment 허용
        // $this->call(UsersTableSeeder::class);
        App\User::truncate(); // 모든 데이터 삭제, auto_increment 컬럼값을 0로 초기화 
        $this->call(UsersTableSeeder::class);

        
        if(config('database.default')!=='sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }             
    }
}
