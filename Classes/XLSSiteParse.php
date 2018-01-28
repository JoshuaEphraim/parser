<?php

include_once('phpquery-master\phpQuery\phpQuery.php');
class XLSSiteParse
{


    public $all_url;
    public $doors;
    function __construct($url)
    {
        $url;
        $habrablog = file_get_contents($url);
        $document = phpQuery::newDocument($habrablog);
        phpQuery::selectDocument($document);
        //Описание товара

        foreach (pq('.product-menu .view-all a') as $el) {
            $this->doors[]=($el->getAttribute('href'));
        }

		foreach($this->doors as $door)
        {
            $habrablog = file_get_contents($door);
            $document = phpQuery::newDocument($habrablog);
            phpQuery::selectDocument($document);
            foreach (pq('.products-list .description a') as $el) {
                $this->all_url[]=($el->getAttribute('href'));
            }
        }

	}

	public function getData()
	{
        $filename = 'url.txt';
        $data = serialize($this->all_url);
        file_put_contents($filename, $data);
	}

}