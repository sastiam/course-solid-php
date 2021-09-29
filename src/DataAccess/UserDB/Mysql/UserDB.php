<?php namespace Sastiam\CourseSolid\DataAccess\UserDB\Mysql;

use Exception;
use PDO;
use Sastiam\CourseSolid\Db\Mysql\DBConnectionInterface;
use Sastiam\CourseSolid\Models\User\UserModel;
use Sastiam\CourseSolid\DataAccess\UserDB\Mysql\UserDBInterface;
use Sastiam\CourseSolid\Utils\Logger;


class UserDB implements UserDBInterface {

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

    /**
     * @return array
     * @throws Exception
     */
    public function all() : array {
        $stmt = $this->dbConnection->prepare("SELECT * FROM users");
        $stmt->execute();
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $this->logger->success()->format("Ejecutando listado de Usuarios");
        return $res;
    }

    /**
     * @param UserModel $userModel
     * @return string
     * @throws Exception
     */
    public function store(UserModel $userModel): string
    {
        // TODO: Implement store() method.
        $stmt = $this->dbConnection->prepare("INSERT INTO users(firstName, lastName) VALUES (:firstName, :lastName)");
        $firstName = $userModel->getFirstName();
        $lastName = $userModel->getLastName();
        $stmt->bindParam(":firstName", $firstName);
        $stmt->bindParam(":lastName", $lastName);
        $stmt->execute();

        $storeLog = $this->logger;

        return $this->dbConnection->lastInsertId() > 0
            ? $storeLog->success()->format("Usuario registrado correctamente")
            : $storeLog->failed()->format("Ocurrio un error al registrar al Usuario");
    }
}
