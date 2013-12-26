<?php
session_start();

// Ease error handling during development
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Borrowed from http://www.phpaddiction.com/tags/axial/url-routing-with-php-part-one/
// Parse the request.
$requesturi = explode('/', $_SERVER['REQUEST_URI']);
$scriptname = explode('/', $_SERVER['SCRIPT_NAME']);
// Remove blanks and subfolders
for ($i= 0; $i < sizeof($scriptname); $i++) {
  if ($requesturi[$i] == $scriptname[$i]) {
    unset($requesturi[$i]);
  }
}
$command = array_values($requesturi);

// Load the commands.
$apps = array(
  'talker' => new Talker(),
  // ... more ...
);

// Execute the command - if it exists.
if (array_key_exists($command[0], $apps)) {
  $app = $apps[$command[0]];
  $app->setRequest($command);
  $app->speak();
} else {
	print "<p>Command unknown!</p>";
}

// Temp setup
class Talker {
  private $request;

  public function setRequest(array $request) {
    $this->request = $request;
  }

  public function speak() {
  	print "<p>Hello there. You asked for me with the following:</p>";
    print "<pre>";
    print_r($this->request);
    print "</pre>";
  }
}
