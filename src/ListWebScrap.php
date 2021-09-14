<?php

namespace HunterPHP;

class ListWebScrap
{

    // list data web support scrap data
    private $data = [
        "google_scholar" => "https://scholar.google.com/scholar?hl=id&as_sdt=0%2C5&q=hunterkey",
        "neliti" => "https://www.neliti.com/id/search?q=hunterkey",
        "research_gate" => "https://www.researchgate.net/search/publication?q=hunterkey",
        "springeropen" => "https://www.springeropen.com/search?query=hunterkey&searchType=publisherSearch"
    ];

    // show return data
    public function getData()
    {
        return $this->data;
    }
}
