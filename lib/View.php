<?php

Namespace SliPHP;

class View
{
    use render; // Load render support
    use locals; // Load locals support
    use blocks; // Load blocks support

    protected $sub;

    /**
     * Initialize view
     */
    function __construct($name)
    {
        $file = SLIPHP_VIEWS . $this->sub . '/' . $name . '.php';

        if (!file_exists($file)) {
            throw new \Exception('Could not find view ' . $file);
        }

        $this->file = $file;
    }
}