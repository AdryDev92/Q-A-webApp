<?php

use Faker\Generator as Faker;

$factory->define(App\Questions::class, function (Faker $faker) {

    $title = rtrim($faker->realText(random_int(25, 50)), '.');
    $slug = str_slug($title);

    return [
        'title' => $title,
        'slug' => $slug,
        'category' => $faker->word,
        'hashtag' => $faker->word,
        'content' => $faker->Text(random_int(1, 500))
    ];
});
