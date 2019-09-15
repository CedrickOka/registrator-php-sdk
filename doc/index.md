# Getting started with PHP SDK for Registrator

PHP SDK for service registry bridge for Docker.

## Prerequisites

The PHP SDK for Registrator has the following requirements:

 - PHP 7.2+

## Installation

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this library:

```bash
$ composer require coka/registrator-php-sdk
```

## How use this?

Now that the library is installed, for get services registered in registry :

```php
$registrator = new Registrator();
$consul = $registrator->consul('http://localhost:8500');

$services = $consul->getServices('redis');
```		
