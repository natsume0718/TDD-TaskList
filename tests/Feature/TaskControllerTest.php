<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerTest extends TestCase
{
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
        $response = $this->get('/tasks/1');
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
        $data = [];

        $response = $this->put(route('task.update', ['id' => 1]), $data);

        $response->assertStatus(302);
    }
}
