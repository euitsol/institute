<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Student::class, function (Faker $faker) {
    $phone = \App\Models\Student::max('phone');
    $years = ['2020', '2019', '2018'];
    return [
        'reg_no' => '200000',
        'name' => $faker->name,
        'fathers_name' => $faker->firstNameMale,
        'mothers_name' => $faker->firstNameFemale,
        'present_address' => $faker->address,
        'permanent_address' => $faker->address,
        'dob' => $faker->date('Y-m-d'),
        'institute_id' => 1,
        'board_roll' => '202278',
        'board_reg' => '184374',
        'phone' => $phone ? $phone + 1 : '11111111111',
        'gender' => 'male',
        'student_as' => 'Industrial',
        'year' => $years[rand(0, 2)],
        'user_id' => 1
    ];
});
