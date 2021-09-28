<?php namespace Sastiam\CourseSolid\DataAccess\UserDB\Mysql;

use Sastiam\CourseSolid\Db\Mysql\DBConnectionInterface;
use Sastiam\CourseSolid\Models\User\UserModel;


class UserDB {

    private \PDO $dbConnection;

    public function __construct(DBConnectionInterface $dbConnection) {
        $this->dbConnection=$dbConnection->connect();
    }

    public function store(UserModel $user) {
        $stmt = $this->dbConnection->prepare("SELECT * FROM users;");
        $stmt->execute();
        $res=$stmt->fetch(PDO::FETCH_ASSOC);
        echo $res;
    }
}
