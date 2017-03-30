<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    public function testSetUserName() {
        $user = new \Users\User('');
        $this->expectException( $user );
    }

    public function testSearchingAUserInAPI() {
        $user = new \Users\User('Dalit');
        $user->search('api');
        $this->assertType('array', $user->getDetails());
    }
}