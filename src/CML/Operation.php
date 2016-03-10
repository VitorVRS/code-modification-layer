<?php

namespace CML;

use CML\Profile\ProfileInterface;

class Operation
{
    /**
     * Operation identifier.
     *
     * @var string
     */
    private $id;

    /**
     * Profile linked to.
     *
     * @var \CML\Profile\ProfileInterface
     */
    private $profile;

    public function __construct($id = null, ProfileInterface $profile = null)
    {
        $this->profile = $profile;
    }
}
