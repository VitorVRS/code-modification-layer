<?php

namespace CML\Storage;

class JSONStorageTest extends \PHPUnit_Framework_TestCase
{
    public function testPrepare()
    {
        $baseDir = '/tmp/storage/json';
        $storage = new JSONStorage('my_id', $baseDir);

        $this->assertFalse(is_dir($baseDir));
        $storage->prepare();
        $this->assertTrue(is_dir($baseDir));

        rmdir($baseDir);
    }

    public function defaultData()
    {
        return array(
            array(1),
            array('teste'),
            array(new \stdClass),
            array(array(1,2,3)),
            array(null),
        );
    }

    /**
     * @dataProvider defaultData
     */
    public function testCrud($content)
    {
        $baseDir = '/tmp/storage/' . uniqid();
        $storage = new JSONStorage(uniqid(), $baseDir);
        $this->assertTrue($storage->delete());
        $storage->prepare();
        $storage->setData($content);

        $this->assertTrue($storage->save());
        $storage->read();
        $this->assertEquals($content, $storage->getData());
        $this->assertTrue($storage->delete());
    }

    /**
     * @expectedException \Exception
     */
    public function testFailSave()
    {
        $baseDir = '/tmp/inexisten/path/' . uniqid();
        $storage = new JSONStorage(uniqid(), $baseDir);
        $storage->save();
    }

    /**
     * @expectedException \Exception
     */
    public function testFailRead()
    {
        $baseDir = '/tmp/inexisten/path/' . uniqid();
        $storage = new JSONStorage(uniqid(), $baseDir);
        $storage->prepare();
        $badContent = '{lsadjhas:alksj[}kdjalsçd"asd":"laHKJS"]';
        file_put_contents($storage->getFilename(), $badContent);
        $storage->read();
    }

}
