<?php

namespace Database\Schemas;

use Pocketframe\PocketORM\Schema\TableScript;
use Pocketframe\PocketORM\Schema\TableBuilder;

class Posts extends TableScript
{
  public function up(): void
  {
    $this->createTable('posts', function (TableBuilder $table) {
      $table->id();
      $table->foreignId('category_id');
      $table->string('title');
      $table->text('content');
      $table->string('slug');
      $table->string('image')->nullable();
      $table->string('status')->default('draft');
      $table->timestamps();
      $table->trashable();
    });
  }

  public function down(): void
  {
    $this->dropTable('posts');
  }
}
