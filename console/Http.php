<?php

namespace Console;

use Illuminate\Http\Client\Factory;

class Http
{
    private static function getInstance()
    {
        return new Factory();
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array  $args
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public static function __callStatic($method, $args)
    {
        return static::getInstance()->$method(...$args);
    }
}
