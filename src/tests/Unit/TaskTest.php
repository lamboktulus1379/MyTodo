<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    public function testASectionIdIsRecorded()
    {
        Task::create([
            'title' => 'Section 1',
            'section_id' => 1
        ]);

        $this->assertCount(1, Task::all());
    }
}
