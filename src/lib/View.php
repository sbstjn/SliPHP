<?php

Namespace SliPHP;

/**
 * Basic View object
 *
 * Class View
 * @package SliPHP
 */
class View
{
    use render; // Load render support
    use locals; // Load locals support
    use blocks; // Load blocks support

    /**
     * Sub path for view folder
     *
     * @var string
     */
    protected $sub;

    /**
     * Check if needed constant configuration is available
     *
     * @throws \RuntimeException
     */
    static function check()
    {
        if (!defined('SLIPHP_VIEWS')) {
            throw new \RuntimeException('Please define global constant SLIPHP_VIEWS');
        }
    }

    /**
     * Initialize view
     *
     * @param $name File name without extension
     * @throws \Exception
     */
    function __construct($name)
    {
        self::check();
        
        $file = SLIPHP_VIEWS . $this->sub . '/' . $name . '.php';

        if (!file_exists($file)) {
            throw new \Exception('Could not find view ' . $file);
        }

        $this->file = $file;
    }
}
