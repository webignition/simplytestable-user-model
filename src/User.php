<?php

namespace webignition\SimplyTestableUserModel;

class User
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

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function equals(User $user)
    {
        return $this->getUsername() === $user->getUsername();
    }
}
