<?php

namespace webignition\SimplyTestableUserModel;

use webignition\SimplyTestableUserInterface\UserInterface;

class User implements UserInterface
{
    /**
      * @var string
     */
    private $username = null;

    /**
     * @var string
     */
    private $password = null;

    /**
     * @param string|null $username
     * @param string|null $password
     */
    public function __construct($username = null, $password = null)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function equals(UserInterface $user): bool
    {
        return $this->getUsername() === $user->getUsername();
    }
}
