<?php

class Room_Controller_Index extends Public_Controller_Index
{

    public function Index()
    {
        $this->setLayout("room");
        $this->setView("room");
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];

        
        $room = Room_Model_RoomType::getInstance()->get($url, $this->lan->LanId);
       // print_r($room);        exit();
        //$blog = Blog_Model_Blog::getInstance()->get($article->BitemBlogId, $this->lan->LanId);
        // $user = Users_Model_User::getInstance()->get($article->BitemAuthor);
        $this->assign("room", $room);
        // $this->assign("blog", $blog);
        // $this->assign("user", $user);
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
