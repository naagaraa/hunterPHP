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

class ListWebScrap
{

    // list data web support scrap data
    private $data = [
        "google_scholar" => "https://scholar.google.com/scholar?hl=id&as_sdt=0%2C5&q=hunterkey",
        "neliti" => "https://www.neliti.com/id/search?q=hunterkey",
        "research_gate" => "https://www.researchgate.net/search/publication?q=hunterkey",
        "springeropen" => "https://www.springeropen.com/search?query=hunterkey&searchType=publisherSearch",
        "ieeexplorer" => "https://ieeexplore.ieee.org/search/searchresult.jsp?newsearch=true&queryText=hunterkey"
    ];

    #note ieeeexplorer still having problem with headless browser -> angular

    // show return data
    public function getData()
    {
        return $this->data;
    }
}
