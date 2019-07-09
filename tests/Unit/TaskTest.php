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
}
