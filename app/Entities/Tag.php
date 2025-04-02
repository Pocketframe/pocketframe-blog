<?php

namespace App\Entities;

use Pocketframe\PocketORM\Entity\Entity;

class Tag extends Entity
{
  /**
   * Define the table name.
   */
  protected static string $table = 'tags';

  /**
   * Define the fillable attributes.
   */
  protected array $fillable = [
    'id',
    'category_id',
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
    'category' => [Entity::OWNED_BY, Category::class, 'category_id']
  ];
}
