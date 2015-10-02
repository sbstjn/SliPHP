<?php

Namespace SliPHP;

Trait locals
{
    private $store = array();

    /**
     * Set local variable
     */
    public function set($name, $data)
    {
        $this->store[$name] = $data;
    }

    /**
     * Get local variable
     */
    public function get($name)
    {
        return $this->store[$name];
    }
}