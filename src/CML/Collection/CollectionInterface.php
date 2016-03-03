<?php

namespace CML\Collection;

interface CollectionInterface
{
  protected $elements;

  /**
   * Returns the element by key
   * @param  string $key Unique key identifier
   * @return mixed      Element wanted
   */
  public function get($key);

  /**
   * Set an element by key
   * @param string $key   Unique key identifier
   * @param mixed $value Element to store
   */
  public function set($key, $value);

  /**
   * Delete/Remove an element by key
   * @param  string $key Unique key identifier
   * @return mixed      The removed element
   */
  public function delete($key);

  /**
   * Merge another collection into this collection
   * @param  CollectionInterface $collection Collection instance
   */
  public function merge(CollectionInterface $collection);
}
