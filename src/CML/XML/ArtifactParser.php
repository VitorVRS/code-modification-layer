<?php

namespace CML\XML;

use DOMElement;
use CML\Artifact;
use CML\Profile\ProfileInterface;
use CML\XML\AbstractParser;
use CML\XML\OperationParser;

class ArtifactParser extends AbstractParser
{
    private $profile;

    public function __construct(DOMElement $xmlRoot, ProfileInterface $profile = null)
    {
        parent::__construct($xmlRoot);
        $this->profile = $profile;
    }

    public function parse()
    {
        $artifact = new Artifact($this->root->path, $this->profile);

        foreach ($this->root->operation as $operationNode) {
            $operationParser = new OperationParser($operationNode, $this->profile);
            $operation = $operationParser->parse();
            $artifact->addOperation($operation);
        }

        return $artifact;
    }
}
