<?php 
use Modules\User\Entities\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
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
        'type' => rand(1,2),
    ];
});