<?php

namespace App\Entities;

use Pocketframe\PocketORM\Concerns\Trashable;
use Pocketframe\PocketORM\Entity\Entity;

class Category extends Entity
{
  use Trashable;

  /**
   * Define the fillable attributes.
   *
   * @var array<string>
   */
  protected array $fillable = [
    'id',
    'category_name',
    'slug',
    'status',
    'description',
    'created_at',
    'updated_at'
  ];

  /**
   * Define the relationships.
   */
  protected array $relationship = [
    'tags' => [Entity::BRIDGE, Tag::class, 'category_tags', 'category_id', 'tag_id']
  ];
}
