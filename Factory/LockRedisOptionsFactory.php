<?php

namespace Rgkh\Common\Main\LockRedis\Factory;

use Interop\Container\ContainerInterface;
use Test\Common\Main\LockRedis\Options\LockRedisOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LockRedisOptionsFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     *
     * @return LockRedisOptions
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');

        if (!isset($config['lock-redis'])) {
            throw new \RuntimeException('Config key "lock-redis" must be provided.');
        }

        return new LockRedisOptions($config['lock-redis']);
    }

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, LockRedisOptions::class);
    }
}
