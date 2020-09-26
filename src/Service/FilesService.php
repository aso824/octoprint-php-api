<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Service;

use aso824\OctoPrintPHP\DTO\File\CopyFileRequest;
use aso824\OctoPrintPHP\DTO\File\DeleteFileRequest;
use aso824\OctoPrintPHP\DTO\File\File;
use aso824\OctoPrintPHP\DTO\File\FileList;
use aso824\OctoPrintPHP\DTO\File\FileRequest;
use aso824\OctoPrintPHP\DTO\File\FilesRequest;
use aso824\OctoPrintPHP\DTO\File\MoveFileRequest;
use aso824\OctoPrintPHP\DTO\File\SelectFileRequest;
use aso824\OctoPrintPHP\DTO\File\SliceFileParameters;
use aso824\OctoPrintPHP\DTO\File\SliceFileRequest;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class FilesService extends AbstractService implements FilesServiceInterface
{
    public function getFiles(bool $recursive = false, ?string $location = null): FileList
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->doRequest(new FilesRequest($recursive, $location));
    }

    public function getFile(string $path): File
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->doRequest(new FileRequest($path));
    }

    public function select(string $path, bool $print = false): void
    {
        $this->doRequest(new SelectFileRequest($path, $print));
    }

    public function slice(string $path, SliceFileParameters $parameters): File
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->doRequest(new SliceFileRequest($path, $parameters));
    }

    public function copy(string $path, string $destination): void
    {
        $this->doRequest(new CopyFileRequest($path, $destination));
    }

    public function move(string $path, string $destination): void
    {
        $this->doRequest(new MoveFileRequest($path, $destination));
    }

    public function delete(string $path): void
    {
        $this->doRequest(new DeleteFileRequest($path));
    }
}
