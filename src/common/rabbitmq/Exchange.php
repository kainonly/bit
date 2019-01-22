<?php

namespace think\bit\common\rabbitmq;

use PhpAmqpLib\Channel\AMQPChannel;

/**
 * Class Exchange
 * @package think\bit\common\rabbitmq
 * @property AMQPChannel $channel 信道
 * @property string $exchange 交换器名称
 */
class Exchange
{
    private $channel;
    private $exchange;

    public function __construct(AMQPChannel $channel, $exchange)
    {
        $this->channel = $channel;
        $this->exchange = $exchange;
    }

    /**
     * 声明交换器
     * @param string $type 交换器类型
     * @param array $config 配置
     * @return mixed|null
     */
    public function create($type, array $config = [])
    {
        $config = array_merge([
            'passive' => false,
            'durable' => false,
            'auto_delete' => true,
            'internal' => false,
            'nowait' => false,
            'arguments' => [],
            'ticket' => null
        ], $config);

        return $this->channel->exchange_declare(
            $this->exchange,
            $type,
            $config['passive'],
            $config['durable'],
            $config['auto_delete'],
            $config['internal'],
            $config['nowait'],
            $config['arguments'],
            $config['ticket']
        );
    }

    /**
     * 起源交换器绑定交换器
     * @param string $destination 绑定交换器
     * @param array $config 配置
     * @return mixed|null
     */
    public function bind($destination, array $config = [])
    {
        $config = array_merge([
            'routing_key' => '',
            'nowait' => false,
            'arguments' => [],
            'ticket' => null
        ], $config);

        return $this->channel->exchange_bind(
            $destination,
            $this->exchange,
            $config['routing_key'],
            $config['nowait'],
            $config['arguments'],
            $config['ticket']
        );
    }

    /**
     * 起源交换器解除绑定的交换器
     * @param string $destination 绑定交换器
     * @param array $config 配置
     * @return mixed
     */
    public function unbind($destination, array $config = [])
    {
        $config = array_merge([
            'routing_key' => '',
            'nowait' => false,
            'arguments' => [],
            'ticket' => null
        ], $config);

        return $this->channel->exchange_unbind(
            $destination,
            $this->exchange,
            $config['routing_key'],
            $config['nowait'],
            $config['arguments'],
            $config['ticket']
        );
    }

    /**
     * 删除交换器
     * @param array $config 配置数组
     * @return mixed|null
     */
    public function delete(array $config = [])
    {
        $config = array_merge([
            'if_unused' => false,
            'nowait' => false,
            'ticket' => null
        ], $config);

        return $this->channel->exchange_delete(
            $this->exchange,
            $config['if_unused'],
            $config['nowait'],
            $config['ticket']
        );
    }
}