<?php

class Gallery2_Controller_Index extends Public_Controller_Index {

    public function Index() {
        $this->setLayout("real");
        $this->setView("realstate");
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];
       
        //print_r($url);
        //exit();
        
        //$blog = Blog_Model_Blog::getInstance()->getByUrl($url, $this->lan->LanId);
        //$this->assign("blog", $blog);
    }
    
    

    

}
