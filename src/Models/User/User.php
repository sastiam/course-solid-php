<?php

namespace Sastiam\CourseSolid\Models\User;

interface UserModelInterface {
    public function fullName():string;
}

class UserModel extends Model {

    private string $firstName;
    private string $lastName;

    public function __construct(int $id, \DateTime $updateAt, $firstName, $lastName) {
        parent::__construct($id, $updateAt);
        $this->firstName=$firstName;
        $this->lastName=$lastName;
    }


}