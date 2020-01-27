<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $u = new User;
        $u->name = 'Faruk Ahmed';
        $u->username = 'admin';
        $u->password = bcrypt('12345678');
        $u->role = 'admin';
        $u->save();
    }
}
