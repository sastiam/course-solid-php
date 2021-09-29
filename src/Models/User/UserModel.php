<?php

namespace Sastiam\CourseSolid\Models\User;

use DateTime;
use Sastiam\CourseSolid\Models\Model;

class UserModel extends Model implements UserModelInterface
{

    /**
     * @var string
     */
    private string $firstName;
    /**
     * @var string
     */
    private string $lastName;

    /**
     * @param int $id
     * @param DateTime $updateAt
     * @param $firstName
     * @param $lastName
     */
    public function __construct(int $id, DateTime $updateAt, $firstName, $lastName)
    {
        parent::__construct($id, $updateAt);
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }


    /**
     * @return string
     */
    public function fullName(): string
    {
        // TODO: Implement fullName() method.
        return $this->lastName . " " . $this->firstName;
    }
}