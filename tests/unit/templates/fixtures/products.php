<?php

use Faker\Factory;

$faker = Factory::create();

$products_date = $faker->dateTimeBetween('-1 week', '+1 week');

return [ 
    'title' => $faker->word(),
    'color' => $faker->colorName(),
    'country_id' => $faker->numberBetween(1, 10),
    'category_id' => $faker->numberBetween(1, 10),
    'price' => $faker->randomNumber(5, true),
    'created_at' => $products_date->format('Y-m-d'),
    'updated_at' => $products_date->format('Y-m-d'),
];