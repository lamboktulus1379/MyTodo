<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use App\Repository\Eloquent\SectionRepository;

class SectionController extends Controller
{
    public $_sectionRepository;
    public function __construct(SectionRepository $sectionRepository)
    {
        $this->_sectionRepository = $sectionRepository;
    }
    public function index()
    {

        return SectionResource::collection($this->_sectionRepository->all());
    }
    public function store()
    {
        Section::create($this->validateRequest());
        return response('', 201);
    }

    public function update(int $section)
    {
        $this->_sectionRepository->update($this->validateRequest(), $section);
    }

    public function show(int $section)
    {
        return   $this->_sectionRepository->find($section, 'tasks');
    }

    public function validateData()
    {
        return request()->validate(['title' => 'required', 'description' => 'nullable|string']);
    }
}
