<?php

class LayoutTest extends PHPUnit_Framework_TestCase
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
        new SliPHP\Layout('layout-not-found');
    }
    
    public function testSuccessWithValidViewFile()
    {
        $layout = new SliPHP\Layout('layout-empty');
        
        $this->assertEquals(SLIPHP_VIEWS . 'layouts/layout-empty.php', $layout->file);
    }
    
    public function testSuccessSettingBody()
    {
        $layout = new SliPHP\Layout('layout-empty');
        $layout->body(new SliPHP\View('empty'));
        
        $this->assertInstanceOf('SliPHP\View', $layout->body());
        $this->assertEquals('', $layout->body());
    }
    
    public function testSuccessRenderingBody()
    {
        $layout = new SliPHP\Layout('layout-body');
        $layout->body(new SliPHP\View('html'));
        
        $this->assertInstanceOf('SliPHP\View', $layout->body());
        $this->assertEquals('<strong>Hi!</strong>', $layout->body());
        $this->assertEquals('<div><strong>Hi!</strong></div>', $layout);
    }
    
    public function testSuccessRenderingBlockInLayout()
    {
        $layout = new SliPHP\Layout('layout-block');

        $this->assertEquals('<div><span></span></div>', $layout);
    }
}
