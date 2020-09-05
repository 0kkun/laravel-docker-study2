<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\Person\PersonServiceInterface;
use App\Services\Person\PersonService;
use App\Repositories\Contracts\PersonRepository;
use App\Repositories\Eloquents\EloquentPersonRepository;
use App\Models\Person;
use Mockery;
use App\Http\Controllers\HelloController;

class PersonServiceTest extends TestCase
{
    use RefreshDatabase;

    private $person_service;

    private $person_repository_mock;

    public function setUp(): void
    {
        parent::setUp();

        // 擬似データを作成
        $this->test_data = $this->makePersonTestData();
        // リポジトリをモックする
        $this->setMockery();
        // インスタンスを指定する
        $this->setMockInstance();

        // PersonServiceインスタンス生成
        $this->person_service = app(PersonService::class);
    }

    private function setMockery()
    {
        // データアクセスに対するモックを作成
        $this->person_repository_mock = Mockery::mock(EloquentPersonRepository::class);
    }

    private function setMockInstance()
    {
        // データアクセスに対してモック化を実行
        $this->app->instance(PersonRepository::class, $this->person_repository_mock);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        // テスト終了後にモックを削除
        Mockery::close();
    }


    /**
     * サービスのメソッドテスト
     * 
     * 
     */
    public function testGetAroundThirtyAge(): void
    {
        $return_val = $this->test_data;

        // モックにメソッドを設定する（サービス内で使用するリポジトリメソッドは全てモックする必要がある）
        // 2つ目の引数は、メソッド実行後に返ってきて欲しい物を入れる。
        // これで、実際のリポジトリのインスタンスを生成せず、仮想的に同じ動きをするインスタンスを生成できる
        $this->setPersonRepositoryMethod('getAll', $return_val);

        // サービスのメソッド実行
        $results = $this->person_service->getAroundThirtyAge();

        // echo '10件のデータ中、' . count($results) . '件が30歳オーバー';

        $this->assertNotEmpty($results);
        foreach ($results as $result)
        {
            $this->assertTrue($result->age >= 30);
        }
    }

    /**
     * 
     * 
     */
    public function testPrivateMethod()
    {

        $result = $this->doMethod('test', 2);

        $this->assertTrue($result['input'] == 2);

    }



    // *** メソッド ***

    /**
     * モックしたリポジトリにメソッドを設定する
     * 
     * @param $method_name (メソッド名)
     */
    private function setPersonRepositoryMethod(string $method_name, $return_val)
    {
        $this->person_repository_mock->shouldReceive($method_name)
                                    ->once() // 一回だけ実行
                                    ->andReturn($return_val); // メソッド実行時の返り値
    }

    /**
     * privateメソッドを実行する.
     * @param string $methodName privateメソッドの名前
     * @param $param privateメソッドに渡す引数
     * @return mixed 実行結果
     * @throws \ReflectionException 引数のクラスがない場合に発生.
     */
    private function doMethod(string $methodName, $param)
    {
        // テスト対象のクラスをnewする.
        $controller = new HelloController($this->person_repository_mock, $this->person_service);
        // ReflectionClassをテスト対象のクラスをもとに作る.
        $reflection = new \ReflectionClass($controller);
        // メソッドを取得する.
        $method = $reflection->getMethod($methodName);
        // アクセス許可をする.
        $method->setAccessible(true);
        // メソッドを実行して返却値をそのまま返す.
        return $method->invoke($controller, $param);
    }

    private function makePersonTestData()
    {
        // Peopleの疑似データを作成
        $test_data = factory(Person::class,10)->create();

        return $test_data;
    }
}
