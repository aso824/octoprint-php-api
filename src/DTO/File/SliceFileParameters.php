<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

use aso824\OctoPrintPHP\DTO\Common\Position;

final class SliceFileParameters
{
    private Position $position;
    private ?string $slicer = null;
    private ?string $gcode = null;
    private ?string $printerProfile = null;
    private ?string $profile = null;
    private ?array $profileOverrides = null;
    private ?bool $select = null;
    private ?bool $print = null;

    public function __construct(
        Position $position,
        ?string $slicer = null,
        ?string $gcode = null,
        ?string $printerProfile = null,
        ?string $profile = null,
        ?array $profileOverrides = null,
        ?bool $select = null,
        ?bool $print = null
    ) {
        $this->slicer = $slicer;
        $this->gcode = $gcode;
        $this->position = $position;
        $this->printerProfile = $printerProfile;
        $this->profile = $profile;
        $this->profileOverrides = $profileOverrides;
        $this->select = $select;
        $this->print = $print;
    }

    public function getPosition(): Position
    {
        return $this->position;
    }

    public function setPosition(Position $position): void
    {
        $this->position = $position;
    }

    public function getSlicer(): ?string
    {
        return $this->slicer;
    }

    public function setSlicer(?string $slicer): void
    {
        $this->slicer = $slicer;
    }

    public function getGcode(): ?string
    {
        return $this->gcode;
    }

    public function setGcode(?string $gcode): void
    {
        $this->gcode = $gcode;
    }

    public function getPrinterProfile(): ?string
    {
        return $this->printerProfile;
    }

    public function setPrinterProfile(?string $printerProfile): void
    {
        $this->printerProfile = $printerProfile;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(?string $profile): void
    {
        $this->profile = $profile;
    }

    public function getProfileOverrides(): ?array
    {
        return $this->profileOverrides;
    }

    public function setProfileOverrides(?array $profileOverrides): void
    {
        $this->profileOverrides = $profileOverrides;
    }

    public function getSelect(): ?bool
    {
        return $this->select;
    }

    public function setSelect(?bool $select): void
    {
        $this->select = $select;
    }

    public function getPrint(): ?bool
    {
        return $this->print;
    }

    public function setPrint(?bool $print): void
    {
        $this->print = $print;
    }

    public function toArray(): array
    {
        $result = [
            'position' => $this->position->toArray(),
            'slicer' => $this->slicer,
            'gcode' => $this->gcode,
            'printerProfile' => $this->printerProfile,
            'profile' => $this->profile,
            'select' => $this->select,
            'print' => $this->print
        ];

        if ($this->profileOverrides) {
            foreach ($this->profileOverrides as $k => $v) {
                $result['profile.' . $k] = $v;
            }
        }

        return $result;
    }
}
