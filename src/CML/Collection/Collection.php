<?php

namespace CML\Collection;

class Collection implements CollectionInterface
{
  protected $elements;

  public function get($key)
  {
    if (!$this->exists($key)) throw new InexistentException();
    return $this->element[$key];
  }

  public function set($key, $value)
  {
    $this->elements[$key] = $value;
    return $this;
  }

  public function delete($key)
  {
    $element = $this->get($key);
    unset($this->elements[$key]);
    return $element;
  }

  public function merge(CollectionInterface $collection)
  {
    foreach ($collection->keys() as $key) {
      $this->set($key, $collection->get($key));
    }
    return $this;
  }

  public function keys()
  {
    return array_keys($this->elements);
  }

  public function exists($key)
  {
    return isset($this->elements[$key]);
  }

}
