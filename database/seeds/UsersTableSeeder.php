<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $data = array(
            [
                'name'          =>  'admin',
                'email'         =>  'admin@gmail.com',
                'email_verified_at'         =>  new Datetime,
                'password'      =>  \Hash::make('123'),
                'remember_token'      =>  \Hash::make('123'),
                'created_at'    =>  new Datetime,
                'updated_at'    =>  new Datetime
            ],
        );
        User::insert($data);
    }
}
