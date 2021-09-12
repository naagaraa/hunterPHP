<?php

require "vendor/autoload.php";

use HunterPHP\Hunter;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

$hunter = new Hunter;
$hunter->keyword("hello");
dump($hunter->scrap("science_redirect", "apriori algorithm"));
