<?php

namespace CML\Storage;

interface StorageInterface
{
    /**
     * Method which save info on storage.
     */
    public function save();

    /**
     * Method which read info from storage.
     */
    public function read();

    /**
     * Method which remove info from storage.
     */
    public function delete();
}
