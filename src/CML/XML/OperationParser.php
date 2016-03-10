<?php

namespace CML\XML;

use DOMElement;
use CML\Operation;
use CML\Profile\ProfileInterface;
use CML\XML\AbstractParser;

class OperationParser extends AbstractParser
{
    private $profile;

    public function __construct(DOMElement $xmlRoot, ProfileInterface $profile = null)
    {
        parent::__construct($xmlRoot);
        $this->profile = $profile;
    }

    public function parse()
    {
        $operation = new Operation(null, $this->profile);

        return $operation;
    }
}
