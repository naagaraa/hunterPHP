# HUNTER PHP

simple title scraping using php and goutte for older website, at
1.google scholar
2.neliti
3.research gate,
4.springen open.

not support headless browser or modern webpage like SPA (single page application)

# Install

```bash
composer require nagara/Hunterphp
```

<br>

# code mainteners :goat:

#### [miyukinagara](https://github.com/naagaraa)

<br>

# Knowledge

## learn goutte

- learn DomCrawler https://symfony.com/doc/current/components/dom_crawler.html#form-and-link-support
- browserKit https://symfony.com/doc/current/components/browser_kit.html
- Goutte PHP https://github.com/FriendsOfPHP/Goutte

## basic usage

**require libraries**

```php
require "vendor/autoload.php";

```

**how to use**
how it's work ? this program same with your search in the original page, but with this code i can search title at the same time and get the data save to array.

:warning: **only show search on first page**

```php
use HunterPHP\Hunter;

$hunter = new Hunter;

echo "<h1>Web Data Extraction for Title Journal or Article at Online Journal</h1>";
echo "<h2>study case Web Data extraction for non Headless Browser</h2>";

// example get data from springe open journal
echo "<h3>springer open journal : data extraction -> keyword apriori</h3>";
dump($hunter->scrap("springeropen", "apriori"));

// example get data from google scholar open journal
echo "<h3>google scholar open journal : data extraction -> keyword AI</h3>";
dump($hunter->scrap("google_scholar", "AI"));

// example get data from neliti open journal
echo "<h3>neliti open journal : data extraction -> keyword AI</h3>";
dump($hunter->scrap("neliti", "AI"));

// example get data from research gate open journal
echo "<h3>research gate open journal : data extraction -> keyword AI</h3>";
dump($hunter->scrap("research_gate", "AI"));

```

**another example**

```php
<?php

require "vendor/autoload.php";

use HunterPHP\Hunter;

$hunter = new Hunter;

$keyword = "apriori";

$springeropen = $hunter->scrap("springeropen", $keyword);
$google_scholar = $hunter->scrap("google_scholar", $keyword);
$neliti = $hunter->scrap("neliti", $keyword);
$research_gate = $hunter->scrap("research_gate", $keyword);

$html = <<<HTML
<h1>example with table<h1>
HTML;
echo $html;

?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        /* margin: auto; */
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<table>
    <tr>
        <th>springer open</th>
    </tr>
    <?php foreach ($springeropen as $title) : ?>
        <tr>
            <td><?= $title ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br><br>
<table>
    <tr>
        <th>google scholar</th>
    </tr>
    <?php foreach ($google_scholar as $title) : ?>
        <tr>
            <td><?= $title ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br><br>
<table>
    <tr>
        <th>research gate</th>
    </tr>
    <?php foreach ($research_gate as $title) : ?>
        <tr>
            <td><?= $title ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br><br>
<table>
    <tr>
        <th>neliti</th>
    </tr>
    <?php foreach ($neliti as $title) : ?>
        <tr>
            <td><?= $title ?></td>
        </tr>
    <?php endforeach; ?>
</table>
```

## another reading

V8 Javascript Engine Integration - https://www.php.net/manual/en/book.v8js.php
pecl v8 javascript engine for php - https://pecl.php.net/package/v8js
bug chromium - https://bugs.chromium.org/p/v8/issues/list

## shit

wtf it's harder for scraping website used php, for now to many web application used technologi SPA like angular, reactjs, and other. or it's can say headless browser. i think i want build another tools with nodejs and javascript. and i'am still think how php engnine and javascript engine can communcation or. this one language can communitation to another language without API (Applciation programing interface)
