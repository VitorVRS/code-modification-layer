<?php

namespace CML;

use \DOMElement;
use \CML\Artifact;
use \PhpCollection\Sequence;

class XMLParser
{
    /**
     * XML root
     * @var \DOMElement
     */
    private $root;

    public function __construct(DOMElement $xmlRoot)
    {
        $this->root = $xmlRoot;
    }

    public function parse()
    {
        $modification = $this->root->modification;

        $profile = new GlobalProfile();
        $artifactCollection = new Sequence();

        foreach ($modification->files as $fileNode) {

            $artifact = new Artifact($fileNode->path, $profile);
            $artifactCollection->add($artifact);
        }
    }
}
