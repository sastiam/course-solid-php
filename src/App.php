<?php namespace Sastiam\CourseSolid;
require '../vendor/autoload.php';

use Sastiam\CourseSolid\Config\Environment;
use Sastiam\CourseSolid\Db\DBEnum;
use Sastiam\CourseSolid\Db\Mysql\MysqlConnection;

interface IApp
{
    function loadEnvironment() : string;
    function loadDatabase(): string;
}

class App implements IApp {

    private array $env;
    private string $envName;
    private DBEnum $dbType;
    private Environment $environment;

    public function __construct(array $env, string $envName, Environment $environment)
    {
        $this->env=$env;
        $this->envName=$envName;

        $this->environment=$environment;
    }

    function loadEnvironment(): string {
        $environmentSaved = $this->environment->setEnvironment($this->envName, $this->env);
        echo $environmentSaved;
        return $environmentSaved ? "Environment loaded and saved!" : "Failed to saved environment";
    }

    function loadDatabase(): string {
        try {
            $loadEnvDatabase = $this->environment->getEnvironment("MYSQL_CREDENTIALS");
            $connectDatabase = new MysqlConnection($loadEnvDatabase);

            // echo var_dump($connectDatabase);
            return "Database connected!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

$envArgument = array(
    "DSN"=>"mysql:host=localhost;port=3306;dbname=course",
    "USERNAME"=>"root",
    "PASSWORD"=>"root",
    "OPTIONS"=>[]
);

$initApp = new App($envArgument, "MYSQL_CREDENTIALS", new Environment());
echo "Iniciando App...";
echo $initApp->loadEnvironment();
echo $initApp->loadDatabase();
