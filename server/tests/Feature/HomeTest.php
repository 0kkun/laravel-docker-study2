<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    // トップ画面のHTTPステータスコード200が返されることを検証するテスト
    public function testStatusCode()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $this->assertTrue(true);
    }

    // トップ画面にこんにちは！というテキストが含まれているか検証するテスト
    public function testBody()
    {
        $response = $this->get('/');

        $response->assertSeeText("Laravel");
    }
}
