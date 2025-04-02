<?php

namespace Database\Schemas;

use Pocketframe\PocketORM\Schema\TableScript;
use Pocketframe\PocketORM\Schema\TableBuilder;

class Tags extends TableScript
{
  public function up(): void
  {
    $this->createTable('tags', function (TableBuilder $table) {
      $table->id();
      $table->foreignId('category_id');
      $table->string('tag_name')->unique();
      $table->string('slug')->unique();
      $table->string('status')->default('active');
      $table->string('description')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    $this->dropTable('tags');
  }
}
