<?php
/**
 * User: ugursogukpinar
 * Date: 13/04/16
 * Time: 11:42
 */

namespace O365Graph\Parsers;


class ConfigParser
{

    private static $instance;

    private $config;

    private function __construct()
    {
        $this->config = require_once __DIR__ . '/../../config/app.php';
    }

    public function getKey($key)
    {
        return $this->config[$key];
    }


    public static function getConfig($key)
    {
        if (!static::$instance) {
            static::$instance = new self;
        }

        return static::$instance->getKey($key);
    }


}