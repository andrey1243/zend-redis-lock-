<?php

namespace Test\Common\Main\LockRedis\Factory;

use Interop\Container\ContainerInterface;
use Symfony\Component\Lock\Store\RedisStore;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RedisStoreFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     *
     * @return RedisStore
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $redis = $container->get('LockRedis');

        return new RedisStore($redis);
    }

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, RedisStore::class);
    }
}
