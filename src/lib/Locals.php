<?php

Namespace SliPHP;

class Locals
{
    private $storage = array();

    public $declared = 1;

    public function __get($name)
    {
        if (array_key_exists($name, $this->storage)) {
            return $this->storage[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    public function __isset($name)
    {
        return isset($this->storage[$name]);
    }

    public function __set($name, $value)
    {
        $this->storage[$name] = $value;
    }

    public function __unset($name)
    {
        unset($this->storage[$name]);
    }

}