<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\UpdateTaskCompletionRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Task::query();

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->query('title') . '%');
        }

        if ($request->has('is_completed')) {
            $query->where('is_completed', '=', 0);
        }

        $tasks = $query->get();

        return TaskResource::collection($tasks);
    }

    public function store(TaskStoreRequest $request): TaskResource
    {
        $data = $request->validated();

        $task = Task::query()->create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
        ]);

        return new TaskResource($task);
    }

    public function updateCompletionStatus(Request $request, $id)
    {
        $request->validate([
            'is_completed' => 'required|boolean',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'is_completed' => $request->is_completed,
        ]);

        return response()->json([
            'message' => 'Task status updated.',
            'task' => $task
        ]);
    }
}
