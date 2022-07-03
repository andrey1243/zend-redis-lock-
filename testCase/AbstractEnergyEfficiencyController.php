<?php

abstract class AbstractTestController extends AbstractController
{
    /**
     * @var \Symfony\Component\Lock\LockFactory
     */
    protected $lockFactory;

    protected function getLockFactory(): LockFactory
    {
        if ($this->lockFactory === null) {
            /** @var RedisStore $redisStore */
            $redisStore = $this->getService('LockRedisStore');//сервис должен быть подключен в module.config

            $this->lockFactory = new LockFactory(new RetryTillSaveStore($redisStore, 200, 300)); // 0.2s * 300 = 60s
        }

        return $this->lockFactory;
    }
}
