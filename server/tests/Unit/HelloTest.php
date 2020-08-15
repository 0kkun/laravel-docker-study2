<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Contracts\PersonRepository;
use App\Repositories\Eloquents\EloquentPersonRepository;

class HelloTest extends TestCase
{
    private $person_repository;

    // リポジトリを使用する準備
    public function setUp(): void
    {
        parent::setUp();
        $this->person_repository = app(EloquentPersonRepository::class);
    }

    /**
     * indexページのステータスコードがちゃんと200であるかテスト
     * メソッド名にはtestをつけることがルール
     * アサーションメソッドは、テスト実行時に期待した値と実際の値が同じになっているかどうか確認するメソッド
     * 実行コマンド：vendor/bin/phpunit tests/Unit/HelloTest.php
     * @return void
     */
    public function testIndexStatus()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Eloquentテスト
     * getFirstRecordByNameメソッドのテスト
     * 
     * @return void
     */
    public function testGetFirstRecordByName()
    {
        $param = "鈴木太郎";
        $expected = 26;
        $result = $this->person_repository->getFirstRecordByName($param);
        $this->assertEquals($result[0]->age, $expected);
    }
}
