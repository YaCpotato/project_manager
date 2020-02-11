<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Task;

class TaskTest extends TestCase
{


    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        factory(Task::class)->create([
            'project_id' => 0,
            'name' => 'testTask',
            'completed_at' => null,
            'started_at' => '2019/02/11',
            'deadline' => '2019_02/13'
        ]);

        // GET リクエスト
        $response = $this->get(route('task.index'));

        // レスポンスの検証
        $response->assertOk();
    }
}
