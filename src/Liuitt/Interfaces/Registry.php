<?php

namespace Liuitt\Interfaces;

interface Registry
{
    public function set($key, $value);

    public function get($key);

    public function remove($key);

    public function isRegistered($key);
}
