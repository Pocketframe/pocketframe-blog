<?php

namespace App\Entities;

use Pocketframe\PocketORM\Concerns\Trashable;
use Pocketframe\PocketORM\Entity\Entity;

class Tag extends Entity
{
  use Trashable;

  /**
   * Define the table name.
   */
  protected static string $table = 'tags';

  /**
   * Define the fillable attributes.
   */
  protected array $fillable = [
    'tag_name',
    'slug',
    'status',
    'description',
    'created_at',
    'updated_at',
  ];

  /**
   * Define the relationships.
   */
  protected array $relationship = [
    'categories' => [Entity::BRIDGE, Category::class, 'category_tags', 'tag_id', 'category_id']
  ];
}
