<?php

Namespace SliPHP;

Trait locals
{
    /**
     * Storage for locals
     *
     * @var array
     */
    private $store = array();

    /**
     * @param $name Local name
     * @param $data Local value
     */
    public function set($name, $data)
    {
        $this->store[$name] = $data;
    }

    /**
     * Get local value
     *
     * @param $name Local name
     * @return mixed
     */
    public function get($name)
    {
        return $this->store[$name];
    }
}
