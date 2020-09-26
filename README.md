# OctoPrint PHP API

API wrapper to allow easy use of [OctoPrint REST API](https://docs.octoprint.org/en/master/api) in your PHP appplication.

Please note that library is currently in WIP status.

## Requirements

- PHP ^7.4
- Symfony Serializer ^5.0
- Any PSR-18 compatible HTTP client (consider using [HTTPlug](https://github.com/php-http/httplug))
- OctoPrint ^1.4

## Installation

    composer require aso824/octoprint-php-api

## Usage

This simple example below assumes that you are using HTTPlug and have any compatible HTTP client.

```php
use Http\Discovery\HttpClientDiscovery;
use aso824\OctoPrintPHP\Client;
use aso824\OctoPrintPHP\Configuration;

$httpClient = HttpClientDiscovery::find();

$configuration = new Configuration('http://octoprint.local', 'your-api-key');  
$octoClient = new Client($configuration, $httpClient);

var_dump($octoClient->getVersion()->getServer()); // "1.4.2"

$file = $octoClient->files->getFile('test.gcode');
var_dump($file->getGcodeAnalysis()->getEstimatedPrintTime()); // 10120 (seconds)
```

For list of available action please visit OctoPrint REST API documentation.

## Currently implemented endpoints

| API resource       | Status                              |
|--------------------|-------------------------------------|
| Connection         | :heavy\_check\_mark:                |
| Files              | :white\_check\_mark: Without upload |
| Jobs               | :x:                                 |
| Languages          | :x:                                 |
| Log files          | :x:                                 |
| Printer operations | :x:                                 |
| Printer profiles   | :x:                                 |
| Settings           | :x:                                 |
| Slicing            | :x:                                 |
| System             | :x:                                 |
| Timelapse          | :x:                                 |
| Access control     | :x:                                 |
| Util               | :x:                                 |


## Contributing

All pull requests are welcome. Please follow same convention as in already existing files.

## License

This library is under [MIT license](https://opensource.org/licenses/MIT).
