<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Section;

class TaskManagementTest extends TestCase
{
    use RefreshDatabase;
    public function testATaskCanBeAddedToTodo()
    {
        $response = $this->post('api/tasks', $this->data());

        $response->assertStatus(201);
        $this->assertCount(1, Task::all());
    }

    public function testATitleIsRequired()
    {
        $response = $this->post('api/tasks', array_merge($this->data(), [
            'title' => '',
        ]));

        $response->assertSessionHasErrors('title');
    }

    public function testASectionIsRequired()
    {
        $response = $this->post(
            'api/tasks',
            array_merge($this->data(), [
                'section_id' => '',
            ])
        );

        $response->assertSessionHasErrors('section_id');
    }

    public function testATaskCanBeUpdated()
    {

        $this->post('api/tasks', $this->data());

        $task = Task::first();

        $response = $this->patch(
            'api/tasks/' . $task->id,
            [
                'title' => 'New Todo 1 for Section 1',
                'section_id' => 'New Section 1'
            ]
        );

        $this->assertEquals('New Todo 1 for Section 1', Task::first()->title);
        $this->assertEquals(2, Task::first()->section_id);
        $response->assertStatus(200);
    }

    public function testATaskCanBeDeleted()
    {
        $this->post('api/tasks', array_merge($this->data()));

        $task = Task::first();
        $this->assertCount(1, Task::all());

        $response = $this->delete(
            'api/tasks/' . $task->id
        );

        $this->assertCount(0, Task::all());
        $response->assertStatus(200);
    }

    public function testANewSectionIsAutomaticallyAdded()
    {
        $this->post('api/tasks', [
            'title' => 'Todo 1 for Section 1',
            'section_id' => 'Section 1'
        ]);

        $task = Task::first();
        $section = Section::first();

        $this->assertEquals($section->id, $task->section_id);
        $this->assertCount(1, Section::all());
    }

    public function testTasksCanBeReceived()
    {
        $this->post('api/tasks', $this->data());
        $response = $this->get("api/tasks");

        $response->assertStatus(200);
        $this->assertCount(1, Task::all());
    }

    public function testATaskCanBeReceived()
    {
        // $this->withExceptionHandling();
        $this->post('api/tasks', $this->data());
        $this->assertCount(1, Task::all());

        $response = $this->get('api/tasks/' . Task::first()->id);

        $response->assertStatus(200);
    }

    public function data()
    {
        return [
            'title' => 'Todo 1 for Section 1',
            'section_id' => 1,
            'description' => 'Description'
        ];
    }
}
