<?php

declare(strict_types=1);

namespace App\Excel\Imports;

use Pocketframe\Excel\Contracts\ImporterInterface;
use App\Entities\Category;
use Pocketframe\PocketORM\QueryEngine\QueryEngine;

class CategoryImporter implements ImporterInterface
{
  /**
   * Map a raw row into an associative array.
   *
   * @param array $row
   * @return array
   */
  public function map(array $row): array
  {
    return [
      'category_name' => $row[0] ?? null,
      'slug'          => $row[1] ?? null,
      'status'        => $row[2] ?? null,
    ];
  }

  /**
   * Process the mapped rows.
   *
   * @param array $data
   * @return void
   */
  public function handle(array $data): void
  {
    foreach ($data as $row) {
      $existing_category = (new QueryEngine(Category::class))
        ->where('category_name', '=', $row['category_name'])

        ->first();

      if ($existing_category) {
        continue;
      }


      $category = new Category([
        'category_name' => $row['category_name'],
        'slug'          => $row['slug'],
        'description'   => $row['description'],
        'status'        => $row['status'],
      ]);
      $category->save();
    }
  }
}
