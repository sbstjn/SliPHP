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
        
        $this->assertEquals('', (string)$view);
    }
    
    public function testRenderSimpleHTMLView()
    {
        $view = new SliPHP\View('html');
        
        $this->assertEquals('<strong>Hi!</strong>', (string)$view);
    }
    
    public function testRenderSimpleViewWithVariables()
    {
        $view = new SliPHP\View('variables-1');
        $view->set('test', 'lorem-ipsum');
        
        $this->assertEquals('<strong>lorem-ipsum</strong>', (string)$view);
    }
    
    public function testApplyFilters()
    {
        $view = new SliPHP\View('apply');
        
        $this->assertEquals('<strong>katzeKatze</strong>', (string)$view);
    }

    public function testHelper()
    {
        $view = new SliPHP\View('helper');

        $view->helper('strong', function($value, $view) {
           return '<strong>' . $view->apply($value, 'strtoupper') . '</strong>';
        });

        $view->helper('span', function($value) {
            return '<span>' . $value . '</span>';
        });

        $view->helper('first_strong_second_span', function($first, $second, $view) {
            return $view->strong($first) . $view->span($second);
        });

        $view->set('value', 'katze');

        $this->assertEquals('<strong>KATZE</strong><span>foo</span>', (string)$view);
    }

    public function testHelperWithApply()
    {
        $view = new SliPHP\View('helper-apply');

        $view->helper('strong', function($value, $view) {
            return '<strong>' . $view->apply($value, 'strtoupper') . '</strong>';
        });

        $view->helper('span', function($value, $view) {
            return '<span>' . $view->apply($value, 'strtoupper') . '</span>';
        });

        $view->helper('first_strong_second_span', function($first, $second, $view) {
            return $view->strong($first) . $view->span($second);
        });

        $view->set('value', 'katze');

        $this->assertEquals('<strong>KATZE</strong><span>FOO</span>', (string)$view);
    }
}
