<?php

namespace Database\Blueprints;

use Pocketframe\PocketORM\Data\Blueprint;
use Faker\Generator;

class PostBlueprint extends Blueprint
{
  protected string $entity = \App\Entities\Post::class;

  public function describe(Generator $faker): array
  {
    return [
      'title' => $faker->sentence(6),
      'content' => $faker->paragraph(10),
      'slug' => $faker->slug(6),
      'image' => $faker->imageUrl(640, 480),
      'status' => $faker->randomElement(['draft', 'published']),
      'category_id' => $faker->numberBetween(1, 10),
    ];
  }
}
