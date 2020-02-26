<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $u = new User;
        $u->id = 7;
        $u->name = 'Super Admin';
        $u->username = 'admin';
        $u->password = bcrypt('12345678');
        $u->role = 'admin';
        $u->save();
    }
}
