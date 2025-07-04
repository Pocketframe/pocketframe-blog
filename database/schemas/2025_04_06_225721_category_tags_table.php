<?php

namespace Database\Schemas;

use Pocketframe\PocketORM\Schema\TableScript;
use Pocketframe\PocketORM\Schema\TableBuilder;

class CategoryTags extends TableScript
{
  public function up(): void
  {
    $this->createTable('category_tags', function (TableBuilder $table) {
      $table->foreignId('tag_id');
      $table->foreignId('category_id');
    });
  }

  public function down(): void
  {
    $this->dropTable('category_tags');
  }
}
