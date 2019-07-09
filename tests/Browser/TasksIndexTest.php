<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TasksIndexTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $tasks = Task::all(['title']);

        $this->browse(function (Browser $browser) {
            foreach ($tasks as $title) {
                $browser->visit('/tasks')
                    ->assertSee($title)
                    ->screenshot("tasks_" . $title);
            }
        });
    }
}
