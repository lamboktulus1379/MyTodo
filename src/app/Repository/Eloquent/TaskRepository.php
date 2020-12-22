<?php

namespace App\Repository\Eloquent;

use App\Models\Task;
use App\Repository\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository extends BaseRepository  implements TaskRepositoryInterface
{
  public function __construct(Task $model)
  {
    parent::__construct($model);
  }
  public function all(): Collection
  {
    return $this->model::orderBy('updated_at', 'DESC')->all();
  }
}
