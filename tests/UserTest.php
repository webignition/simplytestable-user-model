<?php

namespace webignition\Tests\SimplyTestableUserModel;

use webignition\SimplyTestableUserModel\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider createAndMutateDataProvider
     *
     * @param string $username
     * @param string $password
     */
    public function testCreateAndMutate($username, $password)
    {
        $user = new User($username, $password);

        $this->assertEquals($username, $user->getUsername());
        $this->assertEquals($password, $user->getPassword());

        $user->setUsername($username.$username);
        $this->assertEquals($username.$username, $user->getUsername());

        $user->setPassword($password.$password);
        $this->assertEquals($password.$password, $user->getPassword());
    }

    /**
     * @return array
     */
    public function createAndMutateDataProvider()
    {
        return [
            'empty' => [
                'username' => null,
                'password' => null,
            ],
            'blank' => [
                'username' => '',
                'password' => '',
            ],
            'username set' => [
                'username' => 'foo',
                'password' => null,
            ],
            'password set' => [
                'username' => null,
                'password' => 'bar',
            ],
        ];
    }

    /**
     * @dataProvider equalsDataProvider
     *
     * @param User $user
     * @param User $comparator
     * @param bool $expectedEquals
     */
    public function testEquals(User $user, User $comparator, $expectedEquals)
    {
        $this->assertEquals($expectedEquals, $user->equals($comparator));
        $this->assertEquals($expectedEquals, $comparator->equals($user));
    }

    /**
     * @return array
     */
    public function equalsDataProvider()
    {
        $user = new User('user');
        $comparator = new User('user2');

        return [
            'user does not equal comparator' => [
                'user' => $user,
                'comparator' => $comparator,
                'expectedEquals' => false,
            ],
            'user does equal user' => [
                'user' => $user,
                'comparator' => $user,
                'expectedEquals' => true,
            ],
            'comparator does equal comparator' => [
                'user' => $comparator,
                'comparator' => $comparator,
                'expectedEquals' => true,
            ],
        ];
    }
}
