<?php

namespace Database\Schemas;

use Pocketframe\PocketORM\Schema\TableScript;
use Pocketframe\PocketORM\Schema\TableBuilder;

class Categories extends TableScript
{
  public function up(): void
  {
    $this->createTable('categories', function (TableBuilder $table) {
      $table->id();
      $table->string('category_name')->unique();
      $table->string('slug')->unique();
      $table->string('status')->default('active');
      $table->string('description')->nullable();
      $table->timestamps();
      $table->trashable();
    });
  }

  public function down(): void
  {
    $this->dropTable('categories');
  }
}
