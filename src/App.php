<?php namespace Sastiam\CourseSolid;
require '../vendor/autoload.php';

use Exception;
use Sastiam\CourseSolid\Config\Environment;
use Sastiam\CourseSolid\Db\DBEnum;
use Sastiam\CourseSolid\Db\Mysql\MysqlConnection;
use Sastiam\CourseSolid\Utils\Logger;

interface IApp
{
    function loadEnvironment() : string;
    function loadDatabase(): string;
}

class App implements IApp {

    private array $env;
    private string $envName;
    private Logger $logger;
    private Environment $environment;

    public function __construct(array $env, string $envName, Environment $environment)
    {
        $this->env=$env;
        $this->envName=$envName;
        $this->environment=$environment;
        $this->logger=new Logger();
    }

    /**
     * @return string
     * @throws Exception
     */
    function loadEnvironment(): string {
        $environmentSaved = $this->environment->setEnvironment($this->envName, $this->env);
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
            new MysqlConnection($loadEnvDatabase);

            // echo var_dump($connectDatabase);
            return $this->logger->success()->format("Database connected!") ;
        } catch (Exception $e) {
            return $this->logger->failed()->format($e->getMessage());
        }
    }
}

$envArgument = array(
    "DSN"=>"mysql:host=127.0.0.1;port=3306;dbname=course",
    "USERNAME"=>"root",
    "PASSWORD"=>"root",
    "OPTIONS"=>[]
);

$initApp = new App($envArgument, "MYSQL_CREDENTIALS", new Environment());
echo "Iniciando App...\n";
echo $initApp->loadEnvironment();
echo $initApp->loadDatabase();
