<?php

Namespace SliPHP;

/**
 * Layout objects extends basic View object
 *
 * Class Layout
 * @package SliPHP
 */
class Layout extends View
{
    use body;

    /**
     * Sub path for view folder
     *
     * @var string
     */
    protected $sub = 'layouts';
}
