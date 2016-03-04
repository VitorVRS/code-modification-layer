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
     * @expectedException \CML\Collection\KeyNotFoundException
     */
    public function testExpectNotFoundException()
    {
      $collection = new Collection();
      $collection->get('inexistent key');
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

    /**
     * @dataProvider defaultData
     */
    public function testMerge($data, $key, $value)
    {
        $newValue = 'test';
        $collection = new Collection($data);
        $collection->merge(new Collection(array($key => $newValue)));

        $this->assertEquals($newValue, $collection->get($key));
    }

    public function testMergeAppendValue()
    {
        $collection1 = new Collection(array(0 => 'test1'));
        $collection2 = new Collection(array(1 => 'test2'));

        $collection1->merge($collection2);
        $this->assertEquals('test1', $collection1->get(0));
        $this->assertEquals('test2', $collection1->get(1));
    }

    /**
     * @dataProvider defaultData
     */
    public function testKeys($data, $key, $value)
    {
      $collection = new Collection($data);
      $this->assertContains($key, $collection->keys());
    }

    /**
     * @dataProvider defaultData
     */
    public function testExists($data, $key, $value)
    {
      $collection = new Collection($data, $key, $value);
      $this->assertTrue($collection->exists($key));
      $this->assertFalse($collection->exists('unexistent key'));
    }
}
