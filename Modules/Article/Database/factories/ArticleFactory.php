<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Article\Entities\Article;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'slug' => $faker->slug,
        'details' => $faker->realText(5000),
        'date' => $faker->date('Y-m-d', NOW()),
        'author' => $faker->name,
        'cover' => $faker->imageUrl($width = 640, $height = 480),
        'view' => 1
    ];
});
