<?php

namespace Sastiam\CourseSolid\Utils;

interface LoggerInterface
{
    /**
     * @param string $string
     * @return string
     */
    public function format(string $string): string;

    /**
     * @return mixed
     */
    public function success(): mixed;

    /**
     * @return mixed
     */
    public function failed(): mixed;

    /**
     * @return mixed
     */
    public function inProcess(): mixed;
}