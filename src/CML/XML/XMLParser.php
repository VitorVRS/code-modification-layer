<?php

namespace CML\XML;

use CML\XML\AbstractParser;

class XMLParser extends AbstractParser
{
    public function parse()
    {
        $modificationParser = new ModificationParser($this->root->modification);
        $artifactCollection = $modificationParser->parse();
    }
}
