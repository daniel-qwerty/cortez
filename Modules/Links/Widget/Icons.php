<?php

class Links_Widget_Icons extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return Links_Widget_Icons
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }

    public function render() {       
        $list = Links_Model_Links::getInstance()->getIcons($this->limit);
        foreach ($list as $new) {
            if(!empty($new->LinImage)){
            ?>
            <li>
                <a target="_blank" href="<?PHP echo $new->LinUrl; ?>"><img src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $new->LinImage; ?>"></a>
            </li>

            

            <?php } } ?>

        <?PHP
    }

}
