<?php

namespace think\bit\common;

use Closure;

final class BitLists
{
    private $lists = [];

    /**
     * 初始化数组
     * @param array $lists
     * @return BitLists $this
     */
    public function data(array $lists)
    {
        $this->lists = $lists;
        return $this;
    }

    /**
     * 数组大小
     * @return int
     */
    public function size()
    {
        return count($this->lists);
    }

    /**
     * 设置键值
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->lists[$key] = $value;
    }

    /**
     * 加入数组
     * @param mixed $data
     */
    public function add(...$data)
    {
        array_push($this->lists, ...$data);
    }

    /**
     * 向前加入数组
     * @param mixed ...$data
     */
    public function unshift(...$data)
    {
        array_unshift($this->lists, ...$data);
    }

    /**
     * 数组是否为空
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->data);
    }

    /**
     * 判断是否存在键名
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->lists);
    }

    /**
     * 判断是否存在键值
     * @param mixed $value
     * @return bool
     */
    public function contains($value)
    {
        return in_array($value, $this->lists);
    }

    /**
     * 获取键值
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->lists[$key];
    }

    /**
     * 移除键值
     * @param string $key
     */
    public function delete($key)
    {
        unset($this->lists[$key]);
    }

    /**
     * 数组开头的单元移出数组
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->lists);
    }

    /**
     * 数组出栈
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->lists);
    }

    /**
     * 去除重复
     * @return array
     */
    public function unique()
    {
        return array_unique($this->lists);
    }

    /**
     * 清除数据
     */
    public function clear()
    {
        $this->data = [];
    }

    /**
     * 返回键名
     * @return array
     */
    public function keys()
    {
        return array_keys($this->lists);
    }

    /**
     * 返回键值
     * @return array
     */
    public function values()
    {
        return array_values($this->lists);
    }

    /**
     * 搜索给定的值，返回键名
     * @param $value
     * @return false|int|string
     */
    public function indexOf($value)
    {
        return array_search($value, $this->lists);
    }

    /**
     * 数组遍历返回
     * @param Closure $closure
     * @return array
     */
    public function map(Closure $closure)
    {
        return array_map($closure, $this->lists);
    }

    /**
     * 数组过滤
     * @param Closure $closure
     * @return array
     */
    public function filter(Closure $closure)
    {
        return array_filter($this->lists, $closure);
    }

    /**
     * 数组切片
     * @param $offset
     * @param null $length
     * @return array
     */
    public function slice($offset, $length = null)
    {
        return array_slice($this->lists, $offset, $length);
    }

    /**
     * 获取数组
     * @return array
     */
    public function toArray()
    {
        return $this->lists;
    }

    /**
     * 转为Json
     * @return false|string
     */
    public function toJson()
    {
        return json_encode($this->lists);
    }

    /**
     * 转为二进制
     * @return mixed
     */
    public function toBinary()
    {
        return msgpack_pack($this->lists);
    }
}