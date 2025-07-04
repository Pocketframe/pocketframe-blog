<?php

namespace App\Entities;

use Pocketframe\PocketORM\Concerns\TenantAware;
use Pocketframe\PocketORM\Concerns\Trashable;
use Pocketframe\PocketORM\Entity\Entity;
use Pocketframe\PocketORM\QueryEngine\QueryEngine;
use Pocketframe\PocketORM\Relationships\HasMultiple;

class Category extends Entity
{
  use Trashable;
  use TenantAware;

  // protected static string $trashColumn = 'delete_status';
  // protected static $trashValue         = 'inactive';
  // protected static $restoreValue       = 'active';

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
    'delete_status',
    'created_at',
    'updated_at'
  ];

  /**
   * Define the relationships.
   */
  protected array $relationship = [
    'tags' => [Entity::BRIDGE, Tag::class, 'category_tags', 'category_id', 'tag_id'],
    'posts' => [Entity::HAS_MULTIPLE, Post::class, 'id'],
  ];

  // public function posts()
  // {
  // Option 1: Return a relationship handler (like HasMultiple)
  // return new HasMultiple($this, Post::class, 'id');

  // Option 2: Return a QueryEngine for more flexibility
  // return QueryEngine::for(Post::class)->where('category_id', '=', $this->id);
  // }

  public static function scopeActive(QueryEngine $query): QueryEngine
  {
    return $query->where('status', '=', 'active');
  }

  public static function scopeInactive(QueryEngine $query): QueryEngine
  {
    return $query->where('status', '=', 'inactive');
  }
}
