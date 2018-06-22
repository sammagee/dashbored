<?php

namespace App\Http\Controllers\API;

use App\Events\TaskAdded;
use App\Events\TaskUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Resources\TaskResource;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        return TaskResource::collection($request->user()->tasks);
    }

    public function store(Request $request)
    {
        $task = Task::create([
            'user_id' => $request->user_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        broadcast(new TaskAdded($request->user(), $task))->toOthers();

        return new TaskResource($task);
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function update(Request $request, Task $task)
    {
        if ($request->user()->id !== $task->user_id) {
            return response()->json(['error' => 'You can only edit your own tasks.']);
        }

        $task->update($request->only(['description', 'status']));

        broadcast(new TaskUpdated($request->user(), $task))->toOthers();

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
