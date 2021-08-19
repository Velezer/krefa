<?php

namespace App\Database;

use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\CIUnitTestCase;
use Codeigniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class PeopleApiTest extends CIUnitTestCase
{
    use ControllerTestTrait, DatabaseTestTrait;

    protected $migrate = false;
    // protected $refresh  = true;
    // protected $seed     = 'TestSeeder';
    protected $basePath = 'app/Daatabase';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIndex()
    {
        $result = $this->withURI('/api/people')
            ->controller(\App\Controllers\PeopleApi::class)
            ->execute('index');

        var_dump($result);

        $this->assertTrue($result->isOK());
    }

    public function testCreate()
    {
        $body = json_encode([
            'id' => 'myid',
            'nama' => 'bar'
        ]);

        $result = $this->withBody($body)
            ->controller(\App\Controllers\PeopleApi::class)
            ->execute('create');

        $this->assertTrue($result->isOK());
    }
}
