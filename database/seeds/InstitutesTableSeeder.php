<?php

use App\Models\Institute;
use Illuminate\Database\Seeder;

class InstitutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = new Institute;
        $i->name = "Dhaka Polytechnic Institute";
        $i->address = "Dhaka";
        $i->division = "Dhaka";
        $i->district = "Dhaka";
        $i->website = "www.dpi.edu.bd";
        $i->user_id = 1;
        $i->save();
    }
}
