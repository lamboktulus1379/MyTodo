<?php

namespace App\Http\Controllers\API;

use App\Models\Task;
use App\Repository\TaskRepositoryInterface;
use App\Http\Controllers\Controller;

use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public $_taskRepository;
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->_taskRepository = $taskRepository;
    }
    public function index()
    {
        return TaskResource::collection($this->_taskRepository->all());
    }
    public function store()
    {
        $this->_taskRepository->create($this->validateRequest());
        return response('', 201);
    }

    public function update(int $task)
    {
        $this->_taskRepository->update($this->validateRequest(), $task);
    }

    public function show(int $task)
    {
        return $this->_taskRepository->find($task);
    }


    public function destroy(int $task)
    {
        return $this->_taskRepository->delete($task);
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'section_id' => 'required',
            'description' => 'nullable|string',
            'state' => 'nullable|string'
        ]);
    }
}
