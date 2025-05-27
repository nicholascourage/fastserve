<?php
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns all tasks', function () {
    Task::factory()->count(3)->create();

    $response = $this->getJson('/api/tasks');

    $response->assertOk();
    $response->assertJsonCount(3, 'data');
});

it('filters tasks by title', function () {
    Task::factory()->create(['title' => 'Buy milk']);
    Task::factory()->create(['title' => 'Walk the dog']);

    $response = $this->getJson('/api/tasks?title=milk');

    $response->assertOk();
    $response->assertJsonCount(1, 'data');
    expect($response->json('data.0.title'))->toContain('milk');
});

it('filters tasks by is_completed', function () {
    Task::factory()->create(['is_completed' => true]);
    Task::factory()->create(['is_completed' => false]);

    $response = $this->getJson('/api/tasks?is_completed=0');

    $response->assertOk();
    $response->assertJsonCount(1, 'data');
    expect($response->json('data.0.is_completed'))->toBeFalse();
});
