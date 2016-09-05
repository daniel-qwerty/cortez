<?php

class Reviews_Widget_Reviews extends Com_Object {

    private $limit;

    /**
     *
     * @return Reviews_Widget_Reviews 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }

    public function render() {

        $list = Reviews_Model_Review::getInstance()->getList($this->limit);
        foreach ($list as $obj) {
            ?>
            <li>
                <blockquote>
                    <p><?= $obj->RevComment; ?></p>
                    <footer> <?= $obj->RevName; ?> </footer>
                    <h5><?= $obj->RevSource; ?></h5>
                </blockquote>
            </li>
            <?php
        }
    }

}
