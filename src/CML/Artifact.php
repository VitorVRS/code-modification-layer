<?php

namespace CML;

class Artifact
{
  /**
   * Collection of Operations
   * @var OperationCollection
   */
  private $operations;

  /**
   * Artifact unique identifier
   * @var string
   */
  private $id;

  public function __construct($id = null)
  {
  }
}
