<?php

class ViewTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if (!defined('SLIPHP_VIEWS')) {
            define('SLIPHP_VIEWS', __DIR__ . '/views/');
        }
    }
    
    /**
     * @expectedException Exception
     */
    public function testFailWithoutValidViewFile()
    {
        new SliPHP\View('not-found');
    }
    
    public function testSuccessWithValidViewFile()
    {
        $view = new SliPHP\View('empty');
        
        $this->assertEquals(SLIPHP_VIEWS . '/empty.php', $view->file);
    }
    
    public function testRenderEmptyView()
    {
        $view = new SliPHP\View('empty');
        
        $this->assertEquals('', $view);
    }
    
    public function testRenderSimpleHTMLView()
    {
        $view = new SliPHP\View('html');
        
        $this->assertEquals('<strong>Hi!</strong>', $view);
    }
    
    public function testRenderSimpleViewWithVariables()
    {
        $view = new SliPHP\View('variables-1');
        $view->set('test', 'lorem-ipsum');
        
        $this->assertEquals('<strong>lorem-ipsum</strong>', $view);
    }
}
