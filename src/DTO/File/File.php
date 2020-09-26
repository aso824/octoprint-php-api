<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

use aso824\OctoPrintPHP\DTO\ResponseDTOInterface;

final class File implements ResponseDTOInterface
{
    private string $name;
    private string $type;

    /** @var string[] */
    private array $typePath;

    private string $path;
    private ?string $hash = null;
    private ?int $size = null;
    private ?int $date = null;
    private ?string $origin = null;

    /** @var string[]|null */
    private ?array $refs = null;

    private ?GCodeAnalysis $gcodeAnalysis = null;

    /** @var File[]|null */
    private ?array $children;

    /** @var FilePrint|null */
    private ?FilePrint $prints = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getTypePath(): array
    {
        return $this->typePath;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function getRefs(): ?array
    {
        return $this->refs;
    }

    public function getGcodeAnalysis(): ?GCodeAnalysis
    {
        return $this->gcodeAnalysis;
    }

    public function getChildren(): ?array
    {
        return $this->children;
    }

    public function getPrints(): ?FilePrint
    {
        return $this->prints;
    }
}
