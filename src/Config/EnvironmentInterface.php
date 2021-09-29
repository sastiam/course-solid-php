<?php

namespace Sastiam\CourseSolid\Config;

interface EnvironmentInterface
{
    /**
     * @param string $env
     * @return bool
     */
    public function checkEnvironment(string $env): bool;

    /**
     * @param string $env
     * @return array
     */
    public function getEnvironment(string $env): array;

    /**
     * @param string $env
     * @param array $environment
     * @return bool
     */
    public function setEnvironment(string $env, array $environment): bool;
}