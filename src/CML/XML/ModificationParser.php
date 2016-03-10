<?php

namespace CML\XML;

use CML\Profile\CustomProfile;
use CML\XML\AbstractParser;
use CML\XML\ArtifactParser;
use PhpCollection\Sequence;

class ModificationParser extends AbstractParser
{
    public function parse()
    {
        $profile = null;

        $type = $this->root->getElementsByTagName('type')->item(0);

        if (!empty($type) && $type != 'global') {
            $profile = new CustomProfile($type);
        }

        $artifactCollection = new Sequence();

        foreach ($this->root->files as $fileNode) {
            $artifactParser = new ArtifactParser($fileNode, $profile);
            $artifact = $artifactParser->parse();
            $artifactCollection->add($artifact);
        }

        return $artifactCollection;
    }
}
