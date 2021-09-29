<?php namespace Sastiam\CourseSolid\DataAccess\UserDB\Mysql;

use PDO;
use Sastiam\CourseSolid\Db\Mysql\DBConnectionInterface;
use Sastiam\CourseSolid\Models\UserModel;


class UserDB {

    /**
     * @var PDO
     */
    private PDO $dbConnection;

    /**
     * @param DBConnectionInterface $dbConnection
     */
    public function __construct(DBConnectionInterface $dbConnection) {
        $this->dbConnection=$dbConnection->connect();
    }

    /**
     * @param UserModel $user
     */
    public function store(UserModel $user) {
        $stmt = $this->dbConnection->prepare("SELECT * FROM users;");
        $stmt->execute();
        $res=$stmt->fetch(PDO::FETCH_ASSOC);
        echo $res;
    }
}
