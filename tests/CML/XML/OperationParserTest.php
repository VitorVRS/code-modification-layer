<?php

namespace CML\XML;

class OperationParserTest extends \PHPUnit_Framework_TestCase
{
    public function provideOperationDomElement()
    {
        $xml = '<operation></operation>';
        $document = new \DOMDocument();
        $document->loadXML($xml);

        return array(
            array($document->documentElement)
        );
    }

    /**
     * @dataProvider provideOperationDomElement
     */
    public function testParseWithEmptyProfile($xml)
    {
        $parser = new OperationParser($xml);
        $operation = $parser->parse();

        $this->assertInstanceOf('\CML\Operation', $operation);
    }
}
