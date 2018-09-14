<?php

namespace bit\common;

use bit\facade\Redis;

abstract class Bedis
{
    protected $key;
    protected $redis = null;

    public function __construct($mutli = null)
    {
        if ($mutli) {
            $this->redis = $mutli;
        } else {
            $this->redis = Redis::model();
        }
    }
}