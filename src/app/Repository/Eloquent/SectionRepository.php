<?php

namespace App\Repository\Eloquent;

use App\Models\Section;
use App\Models\Task;
use App\Repository\SectionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SectionRepository extends BaseRepository  implements SectionRepositoryInterface
{
  public function __construct(Section $model)
  {
    parent::__construct($model);
  }
  public function all(): Collection
  {
    return $this->model->orderBy('created_at','DESC')->get();
  }
}
