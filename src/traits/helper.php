<?php

Namespace SliPHP;

Trait helper
{
    /**
     * Helper storage
     *
     * @var array
     */
    private $helpers = array();

    /**
     * Try to call helper function
     *
     * @param $name
     * @param $args
     * @return mixed
     */
    public function __call($name, $args)
    {
        if (isset($this->helpers[$name])) {
            array_push($args, $this);

            return call_user_func_array($this->helpers[$name], $args);
        } else {
            throw new \BadMethodCallException($name . ' not found ob ' . get_class($this));
        }
    }

    /**
     * Register new helper function
     *
     * @param $name Helper name
     * @param $callback Helper callback
     */
    public function helper($name, $callback)
    {
        $this->helpers[$name] = $callback;
    }
}
