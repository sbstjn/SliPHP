<?php

class LocalsTest extends PHPUnit_Framework_TestCase
{
    public function testLocals()
    {
        $locals = new SliPHP\Locals();

        $locals->key = 'value';

        $this->assertEquals('value', $locals->key);
        $this->assertNull($locals->undefined);
    }
}
