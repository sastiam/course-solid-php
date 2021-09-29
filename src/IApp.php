<?php namespace Sastiam\CourseSolid;

interface IApp
{
    function loadEnvironment(array $env, string $envName) : string;
    function loadDatabase(): string;
}