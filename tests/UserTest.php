<?php
use PHPUnit\Framework\TestCase;
use School\Controller\UserController;
use School\Model\UserModel;
use School\lib\DB;

class UserTest extends TestCase {
    private $controller;

    public function setUp() {
        $model = $this->getMockBuilder(UserModel::class)
            ->setMethods(array('__construct'))
            ->setConstructorArgs([DB::getConnection()])
            ->disableOriginalConstructor()
            ->getMock();

        $model->method('getUsers')->willReturn([[],[],[],[]]);

        $this->controller = $this->getMockBuilder(UserController::class)
            ->setMethods(array('__construct'))
            ->setConstructorArgs([$model])
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testGetUsersReturnArray() {

        $model = $this->getMockBuilder(UserModel::class)
            ->setMethods(array('__construct'))
            ->setConstructorArgs([])
            ->disableOriginalConstructor()
            ->getMock();

        $model->method('getUsers')->willReturn([[],[],[],[]]);

        $this->assertEquals(4, sizeof( $model->getUsers() ) );
    }
}