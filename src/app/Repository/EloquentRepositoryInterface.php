<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
  public function create(array $attribute): Model;
  public function find($id): ?Model;
  public function update(array $attribute, $id);
  public function delete($id);
}
