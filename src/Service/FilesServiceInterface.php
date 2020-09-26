<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Service;

use aso824\OctoPrintPHP\DTO\File\File;
use aso824\OctoPrintPHP\DTO\File\FileList;
use aso824\OctoPrintPHP\DTO\File\SliceFileParameters;

interface FilesServiceInterface extends ServiceInterface
{
    public function getFiles(bool $recursive = false, ?string $location = null): FileList;
    public function getFile(string $path): File;

    public function select(string $path, bool $print = false): void;
    public function slice(string $path, SliceFileParameters $parameters): File;
    public function copy(string $path, string $destination): void;
    public function move(string $path, string $destination): void;
    public function delete(string $path): void;
}
