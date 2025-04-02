<?php

namespace Database\Planters;

use Pocketframe\PocketORM\Data\DataPlanter;
use Database\Blueprints\TagBlueprint;

class TagPlanter extends DataPlanter
{
  public function plant(): void
  {
    $this->createUsing(TagBlueprint::class, 10);
  }
}
