<?php

namespace App\Entities;

use Pocketframe\PocketORM\Concerns\Trashable;
use Pocketframe\PocketORM\Entity\Entity;

class Post extends Entity
{
  use Trashable;


  /**
   * Define the table name.
   */
  protected static string $table = 'posts';

  /**
   * Define the fillable attributes.
   */
  protected array $fillable = [
    'title',
    'content',
    'slug',
    'image',
    'status',
    'category_id'
  ];

  /**
   * Define the relationships.
   */
  protected array $relationship = [
    'category' => [Entity::BELONGS_TO, Category::class, 'category_id'],
  ];
}
