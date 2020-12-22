<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Section;

class SectionManagementTest extends TestCase
{
    use RefreshDatabase;
    public function testASectionCanBeCreated()
    {
        $this->post('api/sections', [
            'title' => 'Section title 1',
            'description' => 'Section Description 1'
        ]);

        $this->assertCount(1, Section::all());
    }

    public function testATitleIsRequired()
    {
        $response = $this->post('api/sections', [
            'title' => '',
        ]);
        $response->assertSessionHasErrors('title');
    }

    public function testASectionCanBeUpdated()
    {
        $this->post('api/sections', [
            'title' => 'Section title 1',
            'description' => 'Section Description 1'
        ]);

        $section = Section::first();

        $this->patch('api/sections/' . $section->id, [
            'title' => 'New Section title 1',
            'description' => 'New Section Description 1'
        ]);

        $this->assertEquals('New Section title 1', Section::first()->title);
        $this->assertEquals('New Section Description 1', Section::first()->description);
    }

    public function testASectionCanBeDeleted()
    {
        $this->post('api/sections', [
            'title' => 'Section title 1',
            'description' => 'Section Description 1'
        ]);

        $this->assertCount(1, Section::all());
        $section = Section::first();

        $this->delete('api/sections/' . $section->id);
        $this->assertCount(0, Section::all());
    }
}
