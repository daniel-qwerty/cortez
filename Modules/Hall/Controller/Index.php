<?php

class Hall_Controller_Index extends Public_Controller_Index
{

    public function Index()
    {
        $this->setLayout("room");
        $this->setView("hall");
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];

        
        $hall = Hall_Model_Hall::getInstance()->get($url, $this->lan->LanId);
       // print_r($room);        exit();
        $this->assign("hall", $hall);        
    }

    public function Lista()
    {
        $this->setLayout("article");
        $this->setView("articles");
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];

        //print_r($url);
        //exit();

        //$blog = Articles_Model_BlogItem::getInstance()->getListArticlesRecent($this->lan->LanId, 10);
        // $this->assign("blog", $blog);

    }

    


}
