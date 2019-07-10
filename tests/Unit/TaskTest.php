<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     *
     * @test
     */
    public function Seederデータ取得テスト()
    {
        $tasks = Task::all();
        //10件
        $this->assertEquals(10, count($tasks));
        $taskNotFinished = Task::where('executed', false)->get();
        //10より少ないはず
        $this->assertLessThan(10, count($taskNotFinished));
    }

    /**
     * 詳細情報取得テスト
     * @test
     */
    public function 詳細情報取得テスト()
    {
        $task = Task::find(2);
        $this->assertEquals(2, $task->id);
        //ない番号取得
        $task_notExist = Task::find(9999);
        $this->assertNull($task_notExist);
    }
}
