<?php

namespace CML\Profile;

class Profile implements ProfileInterface
{
    /**
     * @inherited
     */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
