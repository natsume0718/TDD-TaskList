<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TaskUpdateTest extends DuskTestCase
{

    public function testShowDetail()
    {
        $id = 2;
        $task = Task::find($id);
        $this->browse(function (Browser $browser) use ($id, $task) {
            $browser->visit('/tasks/' . $id)
                ->assertInputValue('#title', $task->title)
                ->screenshot("task_detail");
        });
    }

    /**
     * Task Post Test.
     *
     * @throws \Throwable
     */
    public function testPost()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks/2')
                ->assertInputValue('#title', 'テストタスク')
                ->type('#title', 'test task')
                ->screenshot('task_post_typed')
                ->press('更新')
                ->pause(1000)
                ->assertPathIs('/tasks/2')
                ->screenshot('task_post_pressed');
        });
    }
}
