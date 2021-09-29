<?php

namespace Sastiam\CourseSolid\Utils;

use Exception;

interface LoggerInterface {
    public function format(string $string) : string;
    public function success();
    public function failed();
    public function inProcess();
}

abstract class LoggerType {
    const SUCCESS = "green";
    const FAILED = "red";
    const IN_PROCESS = "yellow";
}


class Logger implements LoggerInterface {

    private ColorsLogger $colorsLogger;
    private string $loggerType;

    public function __construct()
    {
        $this->colorsLogger = new ColorsLogger();
    }

    /**
     * @param string $string
     * @return string
     * @throws Exception
     */
    public function format(string $string): string
    {
        // TODO: Implement format() method.
        return $this->colorsLogger->execute("font", $this->loggerType, $string."\n");
    }

    public function success(): static
    {
        // TODO: Implement success() method.
        $this->loggerType = LoggerType::SUCCESS;

        return $this;
    }

    public function failed(): static
    {
        // TODO: Implement failed() method.
        $this->loggerType = LoggerType::FAILED;
        return $this;
    }

    public function inProcess(): static
    {
        // TODO: Implement inProcess() method.
        $this->loggerType = LoggerType::IN_PROCESS;
        return $this;
    }
}