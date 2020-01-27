<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = new Course;
        $c1->title = 'Web Design';
        $c1->title_short_form = 'WD';
        $c1->duration = '3 Months';
        $c1->weekly_days = 2;
        $c1->type = 'Industrial';
        $c1->fee = 10000;
        $c1->user_id = 1;
        $c1->save();
        
        $c2 = new Course;
        $c2->title = 'Web Development';
        $c2->title_short_form = 'WD';
        $c2->duration = '3 Months';
        $c2->weekly_days = 2;
        $c2->type = 'Industrial';
        $c2->fee = 12000;
        $c2->user_id = 1;
        $c2->save();
        
        $c3 = new Course;
        $c3->title = 'Wordpress Theme Development';
        $c3->title_short_form = 'WTD';
        $c3->duration = '3 Months';
        $c3->weekly_days = 2;
        $c3->type = 'Industrial';
        $c3->fee = 11500;
        $c3->user_id = 1;
        $c3->save();
    }
}
