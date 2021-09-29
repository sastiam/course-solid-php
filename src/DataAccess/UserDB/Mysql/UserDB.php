<?php namespace Sastiam\CourseSolid\DataAccess\UserDB\Mysql;

use Exception;
use PDO;
use Sastiam\CourseSolid\DataAccess\Interfaces\IReadable;
use Sastiam\CourseSolid\DataAccess\Interfaces\IWriteable;
use Sastiam\CourseSolid\Db\Mysql\DBConnectionInterface;
use Sastiam\CourseSolid\Models\User\UserModel;
use Sastiam\CourseSolid\Utils\Logger;


class UserDB implements IReadable, IWriteable {

    /**
     * @var PDO
     */
    private PDO $dbConnection;
    private Logger $logger;

    /**
     * @param DBConnectionInterface $dbConnection
     */
    public function __construct(DBConnectionInterface $dbConnection) {
        $this->dbConnection=$dbConnection->connect();
        $this->logger = new Logger();
    }


    public function get(int $id)
    {
        // TODO: Implement get() method.
    }

    /**
     * @throws Exception
     */
    public function getAll(): bool| array
    {
        // TODO: Implement getAll() method.
        $stmt = $this->dbConnection->prepare("SELECT * FROM users");
        $stmt->execute();
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $this->logger->inProcess()->format("Get all users...");
        $array = [];
        foreach ($res as $user) {
            $array[] = new UserModel($user['id'], new \DateTime($user['updatedAt']), $user['firstName'], $user['lastName']);
        }
        return $array;
    }

    public function update(int $id, object $obj)
    {
        // TODO: Implement update() method.
    }

    /**
     * @throws Exception
     */
    public function create(object $obj): string
    {
        // TODO: Implement create() method.
        $stmt = $this->dbConnection->prepare("INSERT INTO users(firstName, lastName) VALUES (:firstName, :lastName)");
        $firstName = $obj->getFirstName();
        $lastName = $obj->getLastName();
        $stmt->bindParam(":firstName", $firstName);
        $stmt->bindParam(":lastName", $lastName);
        $stmt->execute();

        $storeLog = $this->logger;

        return $this->dbConnection->lastInsertId() > 0
            ? $storeLog->success()->format("Usuario registrado correctamente")
            : $storeLog->failed()->format("Ocurrio un error al registrar al Usuario");
    }
}
