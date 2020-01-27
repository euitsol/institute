<?php

use App\Models\CourseType;
use Illuminate\Database\Seeder;

class CourseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_types = [
            'Development Courses', 
            'Design Courses', 
            'Networking Courses', 
            'Marketing Courses'
        ];

        foreach ($course_types as $key => $course_type) {
            
            $ct = new CourseType;
            $ct->type_name = $course_type;
            $ct->user_id = 1;
            $ct->save();
        }
    }
}
