<?php

namespace Sastiam\CourseSolid\Utils;

/**
 * Color escapes for bash output
 */
interface ColorsLoggerInterface
{
    public function execute($type, $color, $string): string;
}