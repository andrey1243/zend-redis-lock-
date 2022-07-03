<?php

namespace Test\Common\Main\LockRedis\Factory;

use Interop\Container\ContainerInterface;
use Test\Common\Main\LockRedis\Options\LockRedisOptions;
use Symfony\Component\Lock\Store\RedisStore;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RedisFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     *
     * @return \Redis
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var LockRedisOptions $lockRedisOptions */
        $lockRedisOptions = $container->get(LockRedisOptions::class);

        $redis = new \Redis();
        $redis->connect($lockRedisOptions->getHost(), $lockRedisOptions->getPort(), $lockRedisOptions->getTimeout());
        $redis->select($lockRedisOptions->getDatabase());

        return $redis;
    }

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, RedisStore::class);
    }
}
