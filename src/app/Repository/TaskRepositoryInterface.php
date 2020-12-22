<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
  public function all(): Collection;
}
