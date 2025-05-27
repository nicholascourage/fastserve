<?php

use App\Models\Task;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Testing\TestResponse;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

it('lists tasks', function () {
    Task::factory()->count(3)->create();

    getJson('/api/tasks')
        ->assertOk()
        ->assertJson(function (AssertableJson $json) {
            $json->has('data', 3);
        });
});

it('includes expected details when listing tasks', function () {
    $task = Task::factory()->create([
        'title' => 'Test Task',
        'is_completed' => true,
    ]);

    getJson('/api/tasks')
        ->assertOk()
        ->assertJson(function (AssertableJson $json) use ($task) {
            $json->has('data.0', function (AssertableJson $json) use ($task) {
                $json->where('id', $task->id);
                $json->where('title', 'Test Task');
                $json->where('is_completed', true);
            });
        });
});

function createTask(array $payload = []): TestResponse
{
    return postJson('/api/tasks', [
        'title' => 'Test Task',
        'description' => null,
        ...$payload,
    ]);
}

it('creates a task', function () {
    createTask([
        'title' => 'Test Task',
        'description' => 'Test Description',
    ])
        ->assertCreated()
        ->assertJson(function (AssertableJson $json) {
            $json->has('data', function (AssertableJson $json) {
                $json->has('id');
                $json->where('title', 'Test Task');
                $json->where('is_completed', false);
            });
        });

    $this->assertDatabaseHas('tasks', [
        'title' => 'Test Task',
        'description' => 'Test Description',
        'is_completed' => false,
    ]);
});

it('validates input when creating a task', function (string $field, mixed $value) {
    createTask([$field => $value])
        ->assertJsonValidationErrorFor($field);
})->with([
    ['title', ''],
    ['title', str_repeat('a', 256)],
]);
