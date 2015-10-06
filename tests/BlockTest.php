<?php

class BlockTest extends PHPUnit_Framework_TestCase
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
    public function testFailWithoutValidBlockFile()
    {
        new SliPHP\Block('block-not-found');
    }
    
    public function testSuccessWithValidBlockFile()
    {
        $block = new SliPHP\Block('block-empty');
        
        $this->assertEquals(SLIPHP_VIEWS . 'blocks/block-empty.php', $block->file);
    }
    
    public function testRenderEmptyBlock()
    {
        $block = new SliPHP\Block('block-empty');
        
        $this->assertEquals('', $block);
    }

    public function testRenderSimpleHTMLBlock()
    {
        $block = new SliPHP\Block('block-html');
        
        $this->assertEquals('<span></span>', $block);
    }

}