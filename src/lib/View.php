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
     * @var Locals
     */
    public $locals;

    /**
     * Initialize view
     *
     * @param $name File name without extension
     * @param $locals Locals Pass external locals store
     * @throws \Exception
     */
    public function __construct($name, $locals = null)
    {
        $file = SLIPHP_VIEWS . $this->sub . '/' . $name . '.php';
        $this->locals = $locals ? $locals : new \SliPHP\Locals();

        if (!file_exists($file)) {
            throw new \Exception('Could not find view ' . $file);
        }

        $this->file = $file;
    }

    /**
     * @param $name Local name
     * @param $data Local value
     */
    public function set($name, $data)
    {
        $this->locals->$name = $data;
    }

    /**
     * Get local value
     *
     * @param $name Local name
     * @return mixed
     */
    public function get($name)
    {
        return $this->locals->$name;
    }
}
