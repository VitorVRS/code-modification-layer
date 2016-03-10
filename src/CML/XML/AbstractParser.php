<?php

namespace CML\XML;

use DOMElement;

abstract class AbstractParser implements ParserInterface
{
    /**
     * XML root.
     *
     * @var \DOMElement
     */
    private $root;

    public function __construct(DOMElement $xmlRoot)
    {
        $this->root = $xmlRoot;
    }

    abstract public function parse();
}
