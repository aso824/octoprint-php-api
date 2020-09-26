<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

use aso824\OctoPrintPHP\DTO\ResponseDTOInterface;

final class FileList implements ResponseDTOInterface
{
    /** @var File[] */
    private array $files;

    private int $free;
    private int $total;

    public function getFiles(): array
    {
        return $this->files;
    }

    public function getFree(): int
    {
        return $this->free;
    }

    public function getTotal(): int
    {
        return $this->total;
    }
}
