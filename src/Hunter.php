<?php

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

    public function FilterData($webpages, $key = "")
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

            default:
                # code...
                break;
        }
    }

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

        // config
        $filter_data = self::FilterData($webpages, $key);
        $url_client = (object) $list->getData();
        $web_client = $url_client->{$webpages};
        $http_client = str_replace("hunterkey", $filter_data["hunterkey"], $web_client);


        $client = new Client(HttpClient::create([
            'timeout' => 120,
            'verify_peer' => false,
            'verify_host' => false
        ]));
        $crawler = $client->request('GET', $http_client);

        $extract_data = [];
        $crawler->filter($filter_data["htmldom"])->each(function ($node) use (&$extract_data) {
            // echo $node->text() . "<br>";
            array_push($extract_data, $node->text());
        });

        return $extract_data;
    }
}
