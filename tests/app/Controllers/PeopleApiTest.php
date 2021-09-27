<?php

namespace App\Controllers;

use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
use Codeigniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Config\Factories;

class PeopleApiTest extends CIUnitTestCase
{
    use ControllerTestTrait, DatabaseTestTrait;

    // protected $refresh  = true;
    protected $basePath = 'app/Database';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIndex()
    {

        $model = new \App\Mocks\MockPeopleModel();
        Factories::injectMock('models', 'App\Models\PeopleModel', $model);

        $result = $this->withURI('/api/people')
            ->controller(PeopleApi::class)
            ->execute('index');

        var_dump($result);

        $this->assertTrue($result->isOK());
    }

    // public function testCreate()
    // {
    //     $body = json_encode([
    //         'id' => 'myid',
    //         'nama' => 'bar'
    //     ]);

    //     $model = new \App\Mock\MockUserModel();
    //     Factories::injectMock('models', 'App\Models\UserModel', $model);

    //     $result = $this->withBody($body)
    //         ->controller(\App\Controllers\PeopleApi::class)
    //         ->execute('create');

    //     $this->assertTrue($result->isOK());
    // }
}
