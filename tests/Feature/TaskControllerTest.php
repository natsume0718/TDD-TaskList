<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class TaskControllerTest extends TestCase
{

    use DatabaseTransactions;

    private $task;

    protected function setUp()
    {
        parent::setUp();
        $this->task = Task::create([
            'title' => 'テストタスク',
            'executed' => false,
        ]);
    }

    /**
     * Get All Tasks Path Test
     *
     * @test
     */
    public function route確認テスト()
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function タスク詳細ルート確認()
    {
        //存在する
        $response = $this->get('/tasks/' . $this->task->id);
        $response->assertStatus(200);

        //存在しないtaskid
        $response_notfound = $this->get('/task/9999');
        $response_notfound->assertStatus(404);
    }

    /**
     * @test
     */
    public function タスク更新ルート確認()
    {
        $data = [
            'title' => 'test title',
        ];
        $this->assertDatabaseMissing('tasks', $data);
        $response = $this->put('/tasks/' . $this->task->id, $data);

        $response->assertStatus(302)->assertRedirect('/tasks/' . $this->task->id);
        $this->assertDatabaseHas('tasks', $data);
    }

    /**
     * @test
     */
    public function タスク追加ルート確認()
    {
        $response = $this->get(route('task.add'));

        $response->assertStatus(200);
    }
}
