<?php
namespace Sastiam\CourseSolid\DataAccess\UserDB\Mysql;

use Sastiam\CourseSolid\Models\User\UserModel;

interface UserDBInterface {
    public function all() : array;
    public function store(UserModel $userModel) : string;
}