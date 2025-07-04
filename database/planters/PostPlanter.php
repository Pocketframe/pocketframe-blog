<?php

namespace Database\Planters;

use Database\Blueprints\PostBlueprint;
use Pocketframe\PocketORM\Data\DataPlanter;

class PostPlanter extends DataPlanter
{
  public function plant(): void
  {
    $this->createUsing(PostBlueprint::class, 10);
  }
}
