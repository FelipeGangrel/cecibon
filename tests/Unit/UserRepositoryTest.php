<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Repositories\UserRepositoryInterface;

class UserRepositoryTest extends TestCase
{   
    protected $repository;
    protected static $user;

    public function setup()
    {

        parent::setup();
        $this->repository = \App::make(UserRepositoryInterface::class);
    }

    public function testCreateAndSave()
    {   
        $data = [
            'name' => 'foo',
            'email' => 'foo@bol.com.br',
            'password'=> 'testesenhafoo',
        ];
        
        $user = $this->repository->create($data);
        self::$user = $this->repository->save($user);


        $this->assertDatabaseHas('users', [
            'id' => self::$user->getId()
        ]);
    }


    public function testUpdateAndSave()
    {   
        $data = [
            'name' => 'bar',
            'email' => 'bar@bol.com.br',
            'password'=> 'testesenhabar',
        ];

        $user = $this->repository->update($data, self::$user->getId());
        self::$user = $this->repository->save($user);

        $this->assertEquals($data['name'],self::$user->getName());
    }

    public function testFindAll()
    {
        $users = $this->repository->findAll();
        $this->assertContainsOnlyInstancesOf(\App\Entities\User::class, $users);
    }

    public function testDelete()
    {
        $user = $this->repository->find(self::$user->getId());
        $result = $this->repository->delete($user);
        $this->assertTrue($result);
    }

}
