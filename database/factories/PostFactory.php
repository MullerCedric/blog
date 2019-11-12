<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = Str::slug($title, '-');
    return [
        'title' => $title,
        'slug' => $slug,
        'content' => $faker->paragraphs(3, true),
        'published_at' => $faker->dateTimeBetween('-3 years', '3 months'),
        'author_id' => rand(0, 2) > 1 ? User::first()->id : User::latest('id')->first()->id,
    ];
});
