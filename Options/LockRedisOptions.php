<?php

namespace Rgkh\Common\Main\LockRedis\Options;

use Zend\Stdlib\AbstractOptions;

class LockRedisOptions extends AbstractOptions
{
    /**
     * @var string
     */
    private $host = '127.0.0.1';

    /**
     * @var int
     */
    private $port = 6379;

    /**
     * @var int
     */
    private $database = 0;

    /**
     * @var float seconds
     */
    private $timeout = 10.0;

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return int
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param int $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }

    /**
     * @return float
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param float $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }
}
