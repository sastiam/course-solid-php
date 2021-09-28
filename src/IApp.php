<?php namespace Sastiam\CourseSolid;

interface IApp
{
    function loadEnvironment() : string;
    function loadDatabase(): string;
}