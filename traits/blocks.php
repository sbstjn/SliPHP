<?php

Namespace SliPHP;

Trait blocks
{
    /**
     * Render block
     */
    public function block($name)
    {
        return (new Block($name))->render();
    }
}