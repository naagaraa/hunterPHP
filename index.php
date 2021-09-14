<?php

require "vendor/autoload.php";

use HunterPHP\Hunter;

$hunter = new Hunter;
$hunter->keyword("hello");

echo "<h1>Web Data Extraction for Title Journal or Article at Online Journal</h1>";
echo "<h2>study case Web Data extraction for non Headless Browser</h2>";

echo "<h3>springer open journal : data extraction -> keyword AI</h3>";
dump($hunter->scrap("springeropen", "apriori"));

echo "<h3>google scholar open journal : data extraction -> keyword AI</h3>";
dump($hunter->scrap("google_scholar", "AI"));

echo "<h3>neliti open journal : data extraction -> keyword AI</h3>";
dump($hunter->scrap("neliti", "AI"));

echo "<h3>research gate open journal : data extraction -> keyword AI</h3>";
dump($hunter->scrap("research_gate", "AI"));
