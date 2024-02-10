<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    private $usuario = null;

    private $required = [
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->usuario = User::factory()->create();
    }

    public function testIndex()
    {
        // Auth
        // Given
        // When
        $response = $this->get("/");

        // Then
        $response->assertRedirect(route("login"));
    }
}
