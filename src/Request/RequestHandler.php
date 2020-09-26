<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Request;

use aso824\OctoPrintPHP\ConfigurationInterface;
use aso824\OctoPrintPHP\DTO\EmptyResponse;
use aso824\OctoPrintPHP\DTO\RequestDTOInterface;
use aso824\OctoPrintPHP\DTO\ResponseDTOInterface;
use aso824\OctoPrintPHP\Exception\RequestException;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Throwable;

final class RequestHandler implements RequestHandlerInterface
{
    private ConfigurationInterface $configuration;
    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactory;
    private SerializerInterface $serializer;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;

        $this->requestFactory = new Psr17Factory();

        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);

        $this->serializer = new Serializer(
            [
                new ArrayDenormalizer(),
                new PropertyNormalizer(null, null, $extractor),
            ],
            [
                new JsonEncoder(),
            ]
        );
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->configuration = $configuration;
    }

    public function execute(RequestDTOInterface $requestDTO): ResponseDTOInterface
    {
        $httpRequest = $this->createHttpRequest($requestDTO);

        try {
            $httpResponse = $this->httpClient->sendRequest($httpRequest);
        } catch (Throwable $throwable) {
            throw new RequestException($requestDTO, $throwable);
        }

        if ($requestDTO->getResponseClass() === null) {
            return new EmptyResponse();
        }

        $body = $httpResponse->getBody()->getContents();

        return $this->serializer->deserialize(
            $body,
            $requestDTO->getResponseClass(),
            'json',
            [
                AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true,
            ]
        );
    }

    private function createHttpRequest(RequestDTOInterface $requestDTO): RequestInterface
    {
        $request = $this->requestFactory->createRequest(
            $requestDTO->getMethod(),
            $this->configuration->getHost() . $requestDTO->getPath()
        );

        if ($key = $this->configuration->getKey()) {
            $request = $request->withHeader('X-Api-Key', $key);
        }

        if ($body = $requestDTO->getBody()) {
            $stream = $this->requestFactory->createStream(json_encode($body, JSON_THROW_ON_ERROR));

            $request = $request->withBody($stream);
            $request = $request->withHeader('Content-Type', 'application/json');
        }

        return $request;
    }
}
