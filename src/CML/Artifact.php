<?php

namespace CML;

use Profile\ProfileInterface;
use Profile\GlobalProfile;

class Artifact
{
    /**
   * Collection of Operations.
   *
   * @var OperationCollection
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

    public function __construct($id = null, ProfileInterface $profile = null)
    {
        $this->globalProfile = new GlobalProfile();
        $this->profile = $profile;
    }
}
