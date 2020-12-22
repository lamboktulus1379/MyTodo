<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function create(array $attributes): Model
  {
    return $this->model->create($attributes);
  }
  public function find($id, $with = null): ?Model
  {
    if ($with)
      return $this->model::with($with)->find($id);
    return $this->model->find($id);
  }
  public function update(array $attribute, $id)
  {
    return $this->model->where(['id' => $id])->update($attribute);
  }
  public function delete($id)
  {
    return $this->model->destroy($id);
  }
}
