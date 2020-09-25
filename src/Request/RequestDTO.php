<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Request;

final class RequestDTO
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';

    private string $endpoint;
    private string $method;
    private array $parameters;

    public function __construct(string $endpoint, string $method = 'GET', array $parameters = [])
    {
        $this->endpoint = $endpoint;
        $this->method = $method;
        $this->parameters = $parameters;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function setParameter(string $key, $value): self
    {
        $this->parameters[$key] = $value;

        return $this;
    }
}
