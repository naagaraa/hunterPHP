<?php

require "vendor/autoload.php";

use HunterPHP\Hunter;

$hunter = new Hunter;
$hunter->keyword("hello");

// echo "<h1>Web Data Extraction for Title Journal or Article at Online Journal</h1>";
// echo "<h2>study case Web Data extraction for non Headless Browser</h2>";

// // example get data from springe open journal
// echo "<h3>springer open journal : data extraction -> keyword apriori</h3>";
// dump($hunter->scrap("springeropen", "apriori"));

// // example get data from google scholar open journal
// echo "<h3>google scholar open journal : data extraction -> keyword AI</h3>";
// dump($hunter->scrap("google_scholar", "AI"));

// // example get data from neliti open journal
// echo "<h3>neliti open journal : data extraction -> keyword AI</h3>";
// dump($hunter->scrap("neliti", "AI"));

// example get data from research gate open journal
// echo "<h3>research gate open journal : data extraction -> keyword AI</h3>";
// dump($hunter->scrap("ieeexplorer", "web crawler"));
