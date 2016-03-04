<?php

namespace CML\Storage;

class JSONStorage extends Storage
{
    private $baseDir;

    private $id;

    private $data;

    public function __construct($id, $baseDir = 'data/storage/json')
    {
        $this->baseDir = $baseDir;
        $this->file = $id;
    }

    public function getBaseDir()
    {
        return $this->baseDir;
    }

    public function getFilename()
    {
        return rtrim($this->baseDir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$this->id.'.json';
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function save()
    {
        if (!@file_put_contents($this->getFilename(), json_encode($this->data))) {
            throw new \Exception('Could not save data to file: '.$this->getFilename());
        }

        return true;
    }

    public function read()
    {
        if (!file_exists($this->getFilename())) {
            return false;
        }

        $content = file_get_contents($this->getFilename());
        $data = json_decode($content);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('It seems like JSON file is corrupt on invalid: '.$this->getFilename());
        }

        $this->data = $data;
    }

    public function delete()
    {
        if (!file_exists($this->getFilename())) {
            return true;
        }

        return unlink($this->getFilename());
    }

    public function prepare()
    {
        if (is_dir($this->baseDir)) {
            return;
        }

        if (!mkdir($this->baseDir, 0775, true)) {
            throw new \Exception('Cannot create storage directory: '.$this->baseDir);
        }
    }
}
