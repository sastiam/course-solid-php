<?php
namespace Sastiam\CourseSolid\Utils;
use Exception;

/**
 * Color escapes for bash output
 */
interface ColorsLoggerInterface {
    public function execute($type, $color, $string) : string;
}

class ColorsLogger implements ColorsLoggerInterface
{
    private static array $foreground = array(
        'black' => '0;30',
        'dark_gray' => '1;30',
        'red' => '0;31',
        'bold_red' => '1;31',
        'green' => '0;32',
        'bold_green' => '1;32',
        'brown' => '0;33',
        'yellow' => '1;33',
        'blue' => '0;34',
        'bold_blue' => '1;34',
        'purple' => '0;35',
        'bold_purple' => '1;35',
        'cyan' => '0;36',
        'bold_cyan' => '1;36',
        'white' => '1;37',
        'bold_gray' => '0;37',
    );

    private static array $background = array(
        'black' => '40',
        'red' => '41',
        'magenta' => '45',
        'yellow' => '43',
        'green' => '42',
        'blue' => '44',
        'cyan' => '46',
        'light_gray' => '47',
    );

    /**
     * Make string appear in color
     * @param $color
     * @param $string
     * @return string
     * @throws Exception
     */
    private static function font($color, $string): string
    {
        if (!isset(self::$foreground[$color]))
        {
            throw new Exception('Foreground color is not defined');
        }

        return "\033[" . self::$foreground[$color] . "m" . $string . "\033[0m";
    }

    /**
     * Make string appear with background color
     * @param $color
     * @param $string
     * @return string
     * @throws Exception
     */
    private static function background($color, $string): string
    {
        if (!isset(self::$background[$color]))
        {
            throw new Exception('Background color is not defined');
        }

        return "\033[" . self::$background[$color] . 'm' . $string . "\033[0m";
    }

    public function execute($type, $color, $string) : string {
        return call_user_func(array(self::class, $type), $color, $string);
    }
}

