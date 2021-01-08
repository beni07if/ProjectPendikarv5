<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

// $factory->define(Model::class, function (Faker $faker) {
//     return [
//         //
//     ];
// });

{
    factory(App\User::class, 50)->create()->each(function ($user) {
        $user->posts()->save(factory(App\Admin::class)->make());
    });
}
