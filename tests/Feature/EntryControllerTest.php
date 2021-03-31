<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Entry;
use App\Services\EntryService;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class EntryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    private $entry;

    private $entryRequest;
    
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->entry = Entry::factory()->create();
        $this->entryRequest = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph
        ];
        $this->user = User::factory()->create();
    }

    public function test_create_entry_screen_can_be_rendered()
    {
        $response = $this->get('/entries/create');
        
        $response->assertStatus(200);
    }

    public function test_index_screen_can_be_rendered()
    {
        $response = $this->get('/entries');

        $response->assertStatus(200);
    }

    public function test_index_by_user_id_screen_can_be_rendered()
    {
        $response = $this->get('/entries/users/'.$this->user->id.'/show');

        $response->assertStatus(200);
    }

    public function test_store_entry_success()
    {
        $mock = $this->mock(EntryService::class, function (MockInterface $mock) {
            $mock->shouldReceive('store')->once();
        });

        $response = $this->post('/entries/store', $this->entryRequest);

        $response->assertStatus(200);
    }

    public function test_store_entry_failed()
    {   
        $response = $this->post('/entries/store', $this->entryRequest);

        $response->assertStatus(400);
    }
    
    public function test_show_entry_screen_can_be_rendered()
    {
        $response = $this->get('entries/'.$this->entry->id.'/show');
        
        $response->assertStatus(200);
    }
}
