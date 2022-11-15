<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'a',
                'email' => 'aa@mail.com',
                'email_verified_at' =>date('Y-m-d H:i:s'),
                'password' => '00000000',
                'remember_token' => '00000000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'permission_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'b',
                'email' => 'bb@mail.com',
                'email_verified_at' =>date('Y-m-d H:i:s'), 
                'password' => '00000000',
                'remember_token' => '00000000',
                'permission_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);    
    }
}
