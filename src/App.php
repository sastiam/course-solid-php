<?php namespace Sastiam\CourseSolid;
require '../vendor/autoload.php';

use DateTime;
use Exception;
use Sastiam\CourseSolid\Config\Environment;
use Sastiam\CourseSolid\DataAccess\UserDB\Mysql\UserDB;
use Sastiam\CourseSolid\Db\Mysql\MysqlConnection;
use Sastiam\CourseSolid\Models\User\UserModel;
use Sastiam\CourseSolid\Utils\Logger;


class App implements IApp {

    private Logger $logger;
    private Environment $environment;
    private MysqlConnection $bdConnection;

    /**
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment=$environment;
        $this->logger=new Logger();
    }

    /**
     * @param array $env
     * @param string $envName
     * @return string
     * @throws Exception
     */
    function loadEnvironment(array $env, string $envName): string {
        $environmentSaved = $this->environment->setEnvironment($envName, $env);
        return $environmentSaved
            ? $this->logger->success()->format("Environment loaded and saved!")
            : $this->logger->failed()->format("Error has occurred when environment load");
    }

    /**
     * @return string
     * @throws Exception
     */
    function loadDatabase(): string {
        try {
            $loadEnvDatabase = $this->environment->getEnvironment("MYSQL_CREDENTIALS");
            $this->bdConnection = new MysqlConnection($loadEnvDatabase);

            // echo var_dump($connectDatabase);
            return $this->logger->success()->format("Database connected!") ;
        } catch (Exception $e) {
            return $this->logger->failed()->format($e->getMessage());
        }
    }

    /**
     * @return MysqlConnection
     */
    public function getBdConnection(): MysqlConnection
    {
        return $this->bdConnection;
    }


}

$envArgument = array(
    "DSN"=>"mysql:host=127.0.0.1;port=3306;dbname=course",
    "USERNAME"=>"root",
    "PASSWORD"=>"root",
    "OPTIONS"=>[]
);

$initApp = new App(new Environment());
echo "Iniciando App...\n";
echo $initApp->loadEnvironment($envArgument, "MYSQL_CREDENTIALS",);
echo $initApp->loadDatabase();

$user = new UserDB($initApp->getBdConnection());
// echo $user->store(new UserModel(0, new DateTime(), "Alberto", "Francia"));
print_r($user->getAll());
