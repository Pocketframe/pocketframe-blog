<?php

namespace Database\Blueprints;

use Pocketframe\PocketORM\Data\Blueprint;
use Faker\Generator;

class TagBlueprint extends Blueprint
{
  protected string $entity = \App\Entities\Tag::class;

  public function describe(Generator $faker): array
  {
    return [
      'tag_name' => $faker->unique()->name,
      'slug' => $faker->unique()->slug(2),
      'status' => $faker->randomElement(['active', 'inactive']),
      'description' => $faker->text(100),
      'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
      'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
    ];
  }
}
