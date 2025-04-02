<?php

namespace Database\Blueprints;

use Pocketframe\PocketORM\Data\Blueprint;
use Faker\Generator;

class CategoryBlueprint extends Blueprint
{
  protected string $entity = \App\Entities\Category::class;

  public function describe(Generator $faker): array
  {
    return [
      'category_name'    => $faker->unique()->name,
      'slug'        => $faker->unique()->slug(2),
      'status'      => $faker->randomElement(['active', 'inactive']),
      'description' => $faker->text(100),
      'created_at'  => $faker->dateTimeBetween('-1 year', 'now'),
      'updated_at'  => $faker->dateTimeBetween('-1 year', 'now'),
    ];
  }
}
