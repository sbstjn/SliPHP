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
    use helper; // Load helper support
    use apply;  // Load apply support
    
    /**
     * Absolute file path for View
     *
     * @var string
     */
    public $file;

    /**
     * Sub path for view folder
     *
     * @var string
     */
    protected $sub;

    /**
     * Initialize view
     *
     * @param $name File name without extension
     * @throws \Exception
     */
    public function __construct($name)
    {
        $file = SLIPHP_VIEWS . $this->sub . '/' . $name . '.php';

        if (!file_exists($file)) {
            throw new \Exception('Could not find view ' . $file);
        }

        $this->file = $file;
    }
}
