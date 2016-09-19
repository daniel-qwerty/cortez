<?php

class Promos_Widget_Important extends Com_Object
{

    private $lan;
    private $limit;

    /**
     *
     * @return Promos_Widget_Important
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan)
    {
        $this->lan = $lan;
        return $this;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function render()
    {
        $count = 0;
        $list = Promos_Model_Promo::getInstance()->getPromo($this->lan->LanId, $this->limit);
        foreach ($list as $new) {
            $count++;
            ?>

            <img alt="Promo" style="max-width: 70%; height: auto; margin: 3px;" class="normalwidth" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?= $new->ProImage; ?>">

        <?php } ?>

        <?PHP
    }

}
