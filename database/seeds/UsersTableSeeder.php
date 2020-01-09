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
        $user = new User();
        $user->name             = "admin";
        $user->password         = bcrypt("admin");
        $user->email            = "admin@mail.com";
        $user->jabatan          ="admin";
        $user->save();
    }
}
