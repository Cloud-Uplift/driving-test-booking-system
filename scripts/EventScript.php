<?php
require 'vendor/autoload.php'; // Composer autoload

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\Remote\DesiredCapabilities;

$host = 'http://localhost:4444'; // Selenium server URL (change if necessary)
$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

// Navigate to the website
$driver->get('https://www.scrapethissite.com/');

// Find and click the "Explore Sandbox" button
$exploreButton = $driver->findElement(WebDriverBy::xpath("//a[contains(@class, 'btn') and text()='Explore Sandbox']"));
$exploreButton->click();

// Optional: Wait for a while to see the result or interact further
sleep(5); // Wait for 5 seconds

// Optionally, get the page content or take further actions
$content = $driver->getPageSource();
echo $content;

// Close the browser
$driver->quit();
?>
