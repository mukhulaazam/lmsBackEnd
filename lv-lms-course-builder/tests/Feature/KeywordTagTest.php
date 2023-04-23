<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KeywordTagTest extends TestCase
{
    /**
     * @test
     */
    public function canCreateKeywordTag(): void
    {
        $this->withoutExceptionHandling();

        $data = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('api/v1/tags', $data)
            ->assertStatus(201)
            ->assertJson(compact('data'));
        
        $this->assertDatabaseHas('keyword_tags', [
            'title' => $data['title'],
            'description' => $data['description']
            ]);
    }
}
