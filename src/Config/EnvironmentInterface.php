<?php

namespace Sastiam\CourseSolid\Config;

interface EnvironmentInterface
{
    public function checkEnvironment(string $env): bool;
    public function getEnvironment(string $env): array;
    public function setEnvironment(string $env, array $environment): bool;
}