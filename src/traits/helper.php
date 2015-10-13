<?php

Namespace SliPHP;

Trait helper
{
    private $helpers = array();

    public function __call($name, $args)
    {
        if (isset($this->helpers[$name])) {
            array_push($args, $this);

            return call_user_func_array($this->helpers[$name], $args);
        } else {
            throw new \BadMethodCallException($name . ' not found ob ' . get_class($this));
        }
    }

    public function helper($name, $callback)
    {
        $this->helpers[$name] = $callback;
    }
}
