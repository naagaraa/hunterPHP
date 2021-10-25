<?php

/**
 * 
 * this file is single method of PHP Weight Product
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa HunterPHP simple Journal Title Scraping
 * @license     MIT public license
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace HunterPHP;

use Goutte\Client;
use HunterPHP\ListWebScrap;
use Symfony\Component\HttpClient\HttpClient;

class Hunter
{
    private $keyword;

    public function keyword($key = "")
    {
        $this->keyword = $key;
        return $this->keyword;
    }

    /**
     * FilterData for indetify type of support webpages keyword
     *
     * @param string $webpages
     * @param string $key
     * @return void
     */
    public static function FilterData($webpages = "", $key = "")
    {
        switch ($webpages) {
            case 'google_scholar':
                $extract = [
                    "hunterkey" => str_replace(" ", "+", trim($key)),
                    "htmldom" => "h3 > a",
                ];
                return $extract;
                break;

            case 'neliti':
                $extract = [
                    "hunterkey" => str_replace(" ", "+", trim($key)),
                    "htmldom" => ".results-list .search-result-title .sr-title",
                ];
                return $extract;

                break;

            case 'research_gate':
                $extract = [
                    "hunterkey" => str_replace(" ", "%2B", trim($key)),
                    "htmldom" => ".js-changing-content div > .nova-legacy-e-text > a ",
                ];
                return $extract;

                break;

            case 'springeropen':
                $extract = [
                    "hunterkey" => str_replace(" ", "+", trim($key)),
                    "htmldom" => "h3",
                ];
                return $extract;

                break;

            case 'ieeexplorer':
                $extract = [
                    "hunterkey" => str_replace(" ", "%20", trim($key)),
                    "htmldom" => "a ._ngcontent-umw-c113 .xplanchortagroutinghandler .xplhighlight .xplmathjax",
                ];
                return $extract;

                break;

            default:
                # code...
                break;
        }
    }

    /**
     * method for get scrap data and extraction
     *
     * @param string $webpages
     * @param string $key
     * @return void
     */
    public function scrap($webpages = "", $key = "")
    {
        // check if webpages not support at the list data
        $list = new ListWebScrap;
        if (!array_key_exists($webpages, $list->getData())) {
            echo "maaf web {$webpages} belum didukung";
            die;
        }

        if ($key == "") {
            echo "Oops sorry we need the keyword bro";
            die;
        }

        // config goutte
        $filter_data = self::FilterData($webpages, $key);
        $url_client = (object) $list->getData();
        $web_client = $url_client->{$webpages};
        $http_client = str_replace("hunterkey", $filter_data["hunterkey"], $web_client);


        // config httpclient
        $client = new Client(HttpClient::create([
            'timeout' => 120,
            'verify_peer' => false,
            'verify_host' => false
        ]));
        $crawler = $client->request('GET', $http_client);

        // save data to array
        $extract_data = [];
        $crawler->filter($filter_data["htmldom"])->each(function ($node) use (&$extract_data) {
            // echo $node->text() . "<br>";
            array_push($extract_data, $node->text());
        });

        return $extract_data;
    }
}
