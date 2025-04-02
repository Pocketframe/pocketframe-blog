<?php

namespace App\Entities;

use Pocketframe\PocketORM\Entity\Entity;

class Category extends Entity
{
  /**
   * Define the table name.
   */
  protected static string $table = 'categories';

  /**
   * Define the fillable attributes.
   */
  protected array $fillable = [
    'id',
    'category_name',
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
    'tags' => [Entity::HAS_MULTIPLE, Tag::class, 'category_id']

  ];
}
