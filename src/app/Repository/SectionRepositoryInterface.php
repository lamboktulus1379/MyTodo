<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface SectionRepositoryInterface
{
  public function all(): Collection;
}
