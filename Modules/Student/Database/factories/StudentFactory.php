<?php 
use Modules\Student\Entities\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    $sex = ["F", "M"];
    $username = $faker->userName;
    
    return [
        'username' => $username,
        'tel' => $faker->e164PhoneNumber,
        'position' => $faker->jobTitle,
        'email' => $faker->email,
        'password' => Hash::make($username),
        'sex' => $sex[rand(0,1)],
        'name' => $faker->name,
        'nickname' => $faker->lastName,
        'address' => $faker->address,
        'province_id' => rand(1,100),
        'city' => $faker->city,
        'zip_code' => $faker->postcode,
        'member_id' => rand(4,15),
    ];
});