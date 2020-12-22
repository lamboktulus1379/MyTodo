<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'section_id', 'description', 'state'];


    public function section()
    {
        return $this->belongs(Section::class);
    }
}
