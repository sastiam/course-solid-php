<?php namespace Sastiam\CourseSolid\Config;

class Environment implements EnvironmentInterface {

    private array $configEnvironment = [];

    /**
     * @throws \Exception
     */
    public function getEnvironment(string $env) : array
    {
        // TODO: Implement getEnvironment() method.
       // if(!$this->checkEnvironment($env))
        //   throw new \Exception("Environment $env not found in environment file");

        return $this->configEnvironment[$env];
    }

    public function setEnvironment(string $env, array $environment): bool
    {
        $this->configEnvironment[$env] = $environment;
        // echo var_dump($this->configEnvironment);
        return true;
    }

    public function checkEnvironment(string $env): bool
    {
      return in_array($env, $this->configEnvironment);
    }
}