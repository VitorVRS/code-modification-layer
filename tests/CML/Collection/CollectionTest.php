<?php

namespace CML\Collection;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function defaultData()
    {
        return array(
            array(array(1), 0, 1),
            array(array(1, 2), 1, 2),
            array(array(array(1, 2, 3)), 0, array(1, 2, 3)),
            array(array('string'), 0, 'string'),
            array(array(new \stdClass()), 0, new \stdClass()),
        );
    }

    /**
     * @dataProvider defaultData
     */
    public function testGet($data, $key, $expected)
    {
        $collection = new Collection($data);
        $this->assertEquals($collection->get($key), $expected);
    }

    /**
     * @dataProvider defaultData
     */
    public function testSet($data, $key, $value)
    {
        $collection = new Collection();
        $this->assertInstanceOf('\CML\Collection\Collection', $collection->set($key, $value));
        $this->assertEquals($value, $collection->get($key));
    }

    /**
     * @dataProvider defaultData
     */
    public function testDelete($data, $key, $value)
    {
        $collection = new Collection($data);
        $this->assertEquals($value, $collection->delete($key));
        $this->assertFalse($collection->exists($key));
    }

    // @todo
    public function testMerge()
    {
    }

    // @todo
    public function testKeys()
    {
    }

    // @todo
    public function testExists()
    {
    }
}
