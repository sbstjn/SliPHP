<?php

Namespace SliPHP;

/**
 * Locals handling
 *
 * Class Locals
 * @package SliPHP
 */
class Locals
{
    /**
     * Storage
     *
     * @var array
     */
    private $storage = array();

    /**
     * Magic getter
     *
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return array_key_exists($name, $this->storage) ? $this->storage[$name] : null;
    }

    /**
     * Magic setter
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->storage[$name] = $value;
    }
}