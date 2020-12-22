<?php

namespace Tests\Unit;

use App\Models\Section;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SectionTest extends TestCase
{
    use RefreshDatabase;

    public function testOnlyTitleIsRequiredToCreateASection()
    {
        Section::firstOrCreate([
            'title' => 'Section 1'
        ]);

        $this->assertCount(1, Section::all());
    }
}
