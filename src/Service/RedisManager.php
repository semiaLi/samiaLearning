<?php
/**
 * Created by PhpStorm.
 * User: SLI3763
 * Date: 09/01/2018
 * Time: 17:17
 */

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use SymfonyBundles\RedisBundle\Service\ClientInterface;

class RedisManager
{
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var RequestStack
     */
    private $request;
    /**
     * @var null|string
     */
    private $baseUrl;

    /**
     * @var int
     */
    private $redisExpireTime;

    /**
     * RedisManager constructor.
     * @param ClientInterface $client
     * @param RequestStack $request
     */
    public function __construct(ClientInterface $client, RequestStack $request)
    {
        $this->client          = $client;
        $this->request         = $request;
        $this->baseUrl         = ($this->request->getMasterRequest())?$this->request->getMasterRequest()->getRequestUri(): null;
    }

    /**
     * @param int $times
     */
    public function setRedisExpireTime(int $times){

        $this->redisExpireTime = $times;
    }

    /**
     * @return int
     */
    public function getRedisExpireTime(){

        return $this->redisExpireTime;
    }

    /**
     * @param $key
     * @return string
     */
    public function isKeyExiste($key)
    {
        return $this->client->get($key);
    }

    public function getRedisKey()
    {
        return $this->baseUrl;
    }

    /**
     * @param $response
     *
     * @return int
     */
    public function addKeyResponseRedis($response)
    {
        return $this->client->setex($this->baseUrl, $this->getRedisExpireTime(), serialize($response));
    }

    public function getRedisContentByKey($key = null)
    {
        if ($key == null) {
            $key = $this->baseUrl;
        }
        return unserialize($this->client->get($key));
    }
}