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
        $this->assertEquals('', (string)$layout->body());
    }
    
    public function testSuccessRenderingBody()
    {
        $layout = new SliPHP\Layout('layout-body');
        $layout->body(new SliPHP\View('html'));
        
        $this->assertInstanceOf('SliPHP\View', $layout->body());
        $this->assertEquals('<strong>Hi!</strong>', (string)$layout->body());
        $this->assertEquals('<div><strong>Hi!</strong></div>', (string)$layout);
    }
    
    public function testSuccessRenderingBlockInLayout()
    {
        $layout = new SliPHP\Layout('layout-block');

        $this->assertEquals('<div><span></span></div>', (string)$layout);
    }

    public function testPassingLocalsStore()
    {
        $layout = new SliPHP\Layout('layout-empty');
        $layout->body(new SliPHP\View('empty', $layout->locals));
        $body = $layout->body();

        $layout->set('foo', 'bar');
        $body->set('baz', 'oof');

        $this->assertInstanceOf('SliPHP\View', $layout->body());
        $this->assertEquals('bar', $layout->get('foo'));
        $this->assertEquals('bar', $body->get('foo'));
        $this->assertEquals('oof', $body->get('baz'));
        $this->assertEquals('oof', $layout->get('baz'));
    }

    public function testPassingLocalsStoreWhenViewIsFilename()
    {
        $layout = new SliPHP\Layout('layout-empty');
        $layout->body('empty');
        $body = $layout->body();

        $layout->set('foo', 'bar');
        $body->set('baz', 'oof');

        $this->assertInstanceOf('SliPHP\View', $layout->body());
        $this->assertEquals('bar', $layout->get('foo'));
        $this->assertEquals('bar', $body->get('foo'));
        $this->assertEquals('oof', $body->get('baz'));
        $this->assertEquals('oof', $layout->get('baz'));
    }

    public function testStorages()
    {
        $layout = new SliPHP\Layout('layout-empty');
        $layout->set('foo', 'bar');

        $view = new SliPHP\View('empty');
        $view->set('baz', 'oof');

        $layout->body($view);

        $this->assertEquals('bar', $layout->get('foo'));
        $this->assertNull($layout->get('baz'));
        $this->assertEquals('oof', $view->get('baz'));
        $this->assertNull($view->get('foo'));
        $this->assertEquals('oof', $layout->body()->get('baz'));
        $this->assertNull($layout->body()->get('foo'));

    }
}
