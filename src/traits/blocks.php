<?php

Namespace SliPHP;

Trait blocks
{
    /**
     * Get Block object
     *
     * @param $name
     * @return Block
     */
    public function block($name)
    {
        return new Block($name);
    }
}
