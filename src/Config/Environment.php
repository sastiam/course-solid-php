<?php namespace Sastiam\CourseSolid\Config;

use Exception;

class Environment implements EnvironmentInterface {

    /**
     * @var array
     */
    private array $configEnvironment = [];

    /**
     * @param string $env
     * @return array
     */
    public function getEnvironment(string $env) : array
    {
        // TODO: Implement getEnvironment() method.
       // if(!$this->checkEnvironment($env))
        //   throw new \Exception("Environment $env not found in environment file");

        return $this->configEnvironment[$env];
    }

    /**
     * @param string $env
     * @param array $environment
     * @return bool
     */
    public function setEnvironment(string $env, array $environment): bool
    {
        $this->configEnvironment[$env] = $environment;
        // echo var_dump($this->configEnvironment);
        return true;
    }

    /**
     * @param string $env
     * @return bool
     */
    public function checkEnvironment(string $env): bool
    {
      return in_array($env, $this->configEnvironment);
    }
}