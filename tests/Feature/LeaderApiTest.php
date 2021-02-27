<?php

namespace Tests\Feature;

use App\Models\Leaders;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeaderApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test if a leader can be successfully created and returns data back in json format
     *
     * @return void
     */
    public function test_can_create_leader()
    {
        $formData = [
            'name' => 'dipen',
            'age' => 5,
            'address' => '123 main st',
        ];
        $this->withoutExceptionHandling();
        $response = $this->post('/api/leaders', $formData)
            ->assertStatus(201)
            ->assertJson($formData)
            ;
    }
    /**
     * Test if a leaders can be successfully viewed in json format
     *
     * @return void
     */
    public function test_can_show_leader()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/api/leaders')
            ->assertStatus(200)
        ;
    }
    /**
     * Test if a leader can be successfully updated and returns data back in json format
     *
     * @return void
     */
    public function test_can_update_leader()
    {
        $updated = [
            'name' => 'dipen shah',
            'age' => 5,
            'address' => '123 main st',
        ];
        $this->withoutExceptionHandling();
        $response = $this->put('/api/leaders/1', $updated)
            ->assertStatus(200)
            ->assertJson($updated)
        ;
    }
    /**
     * Test if a leaders can be successfully deleted
     *
     * @return void
     */
    public function test_can_delete_leader()
    {
        $this->withoutExceptionHandling();
        $response = $this->delete('/api/leaders/1')
            ->assertStatus(204)
        ;
    }
    /**
     * Test if a leaders point can be incremented
     *
     * @return void
     */
    public function test_can_increase_points_of_leader()
    {
        $this->withoutExceptionHandling();
        $response = $this->put('/api/updatePoints/INCREASE/1')
            ->assertStatus(201)
        ;
    }
    /**
     * Test if a leaders point can be decremented
     *
     * @return void
     */
    public function test_can_decrease_points_of_leader()
    {
        $this->withoutExceptionHandling();
        $response = $this->put('/api/updatePoints/DECREASE/1')
            ->assertStatus(201)
        ;
    }
}
