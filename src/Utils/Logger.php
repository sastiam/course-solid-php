<?php

namespace Sastiam\CourseSolid\Utils;

use Exception;


class Logger implements LoggerInterface {

    private ColorsLogger $colorsLogger;
    /**
     * @var string
     */
    private string $loggerType;

    /**
     *
     */
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

    /**
     * @return $this
     */
    public function success(): static
    {
        // TODO: Implement success() method.
        $this->loggerType = LoggerType::SUCCESS;

        return $this;
    }

    /**
     * @return $this
     */
    public function failed(): static
    {
        // TODO: Implement failed() method.
        $this->loggerType = LoggerType::FAILED;
        return $this;
    }

    /**
     * @return $this
     */
    public function inProcess(): static
    {
        // TODO: Implement inProcess() method.
        $this->loggerType = LoggerType::IN_PROCESS;
        return $this;
    }
}