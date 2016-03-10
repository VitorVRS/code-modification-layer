<?php

namespace CML;

use \CML\Profile\ProfileInterface;
use \CML\Profile\GlobalProfile;
use \PhpCollection\Sequence;

class Artifact
{
    /**
     * Collection of Operations.
     *
     * @var \PhpCollection\Sequence
     */
    private $operations;

    /**
     * Artifact unique identifier.
     *
     * @var string
     */
    private $id;

    /**
     * An global(default) profile for operations.
     *
     * @var \CML\ProfileInterface
     */
    private $globalProfile;

    /**
     * An profile for extra operations.
     *
     * @var \CML\ProfileInterface
     */
    private $profile;

    /**
     * Indicate if object data is already loaded
     * @var boolean
     */
    private function $loaded = false;

    public function __construct($id = null, ProfileInterface $profile = null)
    {
        $this->id = $id;
        $this->globalProfile = new GlobalProfile();
        $this->profile = $profile;

        // new ArtifactObject
    }

    public function load()
    {
        if ($this->isLoaded()) return;

        $storage = new JSONStorage($this->id);
        $storage->read();

        $rawData = $storage->getData();

        $this->loaded = true;
    }

    public function addOperation(\CML\Operation $operation)
    {
        if ($this->operations === null) {
            $this->operations = new Sequence();
        }

        $this->operations->add($operation);
    }

    public function setOperations(\PhpCollection\Sequence $operations)
    {
        $this->operations = $operationa;
    }

    public function getOperations()
    {
        return $this->operations;
    }

}
