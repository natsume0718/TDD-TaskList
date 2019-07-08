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
}
