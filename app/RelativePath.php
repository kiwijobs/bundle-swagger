<?php

namespace Absolvent\swagger;

use Illuminate\Support\Str;

class RelativePath
{
    public $basePath;
    public $pathInfo;

    public function __construct(string $basePath, string $pathInfo)
    {
        $this->basePath = $basePath;
        $this->pathInfo = $pathInfo;
    }

    public function getRelativePath(): string
    {
        if (Str::startsWith($this->pathInfo, $this->basePath)) {
            return substr($this->pathInfo, strlen($this->basePath));
        }

        return $this->pathInfo;
    }

    public function __toString(): string
    {
        return $this->getRelativePath();
    }
}
