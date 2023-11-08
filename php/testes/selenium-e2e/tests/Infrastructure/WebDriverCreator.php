<?php

namespace Tests\Infrastructure;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriver;

class WebDriverCreator
{
    public static function createWebDriver(): WebDriver
    {
        // Arrange
        $host = 'http://localhost:4444';
        return RemoteWebDriver::create($host, DesiredCapabilities::chrome());
    }
}