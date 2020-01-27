<?php

use App\Models\Mentor;
use Illuminate\Database\Seeder;

class MentorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m1 = new Mentor;
        $m1->name = 'Al-Mamun Sarkar';
        $m1->fathers_name = 'Janina';
        $m1->mothers_name = 'Janina';
        $m1->phone = '01744564853';
        $m1->email = 'almamun@gmail.com';
        $m1->present_address = 'Dhaka';
        $m1->education = 'Bsc in CSE';
        $m1->speciality = 'Laravel Framework';
        $m1->course_id = 2;
        $m1->user_id = 1;
        $m1->save();
    
        $m2 = new Mentor;
        $m2->name = 'Reza';
        $m2->fathers_name = 'Janina';
        $m2->mothers_name = 'Janina';
        $m2->phone = '3485694569';
        $m2->email = 'reza@gmail.com';
        $m2->present_address = 'Dhaka';
        $m2->education = 'Bsc in CSE';
        $m2->speciality = 'Networking';
        $m2->course_id = 2;
        $m2->user_id = 1;
        $m2->save();
    }
}
