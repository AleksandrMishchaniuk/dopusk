<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Tolerance::class, function (Faker\Generator $faker) {
    return [
        'max_val' => $faker->numberBetween(2, 2000),
        'min_val' => $faker->numberBetween(-2000, -2),
        'system' => $faker->randomElement(['hole', 'shaft']),
        // 'range_id' => factory(App\Models\Range::class)->create()->id,
        // 'field_id' => factory(App\Models\Field::class)->create()->id,
        // 'quality_id' => factory(App\Models\Quality::class)->create()->id,
    ];
});
