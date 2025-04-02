<?php

namespace Database\Planters;

use Pocketframe\PocketORM\Data\DataPlanter;
use Database\Blueprints\CategoryBlueprint;

class CategoryPlanter extends DataPlanter
{
  public function plant(): void
  {
    $this->createUsing(CategoryBlueprint::class, 10);
  }
}
