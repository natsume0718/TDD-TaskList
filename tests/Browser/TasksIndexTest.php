<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TasksIndexTest extends DuskTestCase
{

    public function testIndex()
    {
        $tasks = Task::all(['title']);
        $this->browse(function (Browser $browser) use ($tasks) {
            foreach ($tasks as $task) {
                $browser->visit('/tasks')
                    ->assertSee($task->title)
                    ->screenshot("tasks_" .  $task->title);
            }
        });
    }

    public function testIndextoDetail()
    {
        $task = Task::find(1);
        $this->browse(function (Browser $browser) use ($task) {
            $browser->visit('/task')
                ->assertSeeLink($task->title)
                ->clickLink($task->title)
                ->waitForLocation('/task/' . $task->id, 1)
                ->assertPathIs('/task/' . $task->id)
                ->assertSee($task->title);
        });
    }

    public function testIndexToNew()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tasks')
                ->assertSeeLink('新規追加')
                ->clickLink('新規追加')
                ->waitForLocation('/tasks/add')
                ->assertPathIs('/tasks/add');
        });
    }
}
