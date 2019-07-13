<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;

class TaskTest extends TestCase
{

    use DatabaseTransactions;

    /**
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

    /**
     * タスク更新テスト
     * @test
     */
    public function タスク更新()
    {
        $faker = Faker::create();
        $title = $faker->sentence();
        $executed = $faker->boolean();
        $task = Task::create([
            'title' => $title,
            'executed' => $executed
        ]);

        $this->assertEquals($title, $task->title);

        $title2 = $faker->sentence();
        $executed2 = $faker->boolean();
        $task->fill([
            'title' => $title2,
            'executed' => $executed2
        ]);
        $task->save();

        $task2 = Task::find($task->id);
        $this->assertEquals($title2, $task2->title);
    }
}
