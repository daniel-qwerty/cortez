<?php

class SpecialOffers_Widget_List extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return SpecialOffers_Widget_List 
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

        $list = SpecialOffers_Model_SpecialOffer::getInstance()->getList($this->lan->LanId, $this->limit);
        
        foreach ($list as $new) {
            ?>            
            <li class="pricing-cirle element-top-0 element-bottom-40 os-animation"
                data-os-animation="fadeIn" data-os-animation-delay="0s">
                <div class="pricing-item-list-content">
                    <h3><?= $new->SpeName; ?>
                        <span><a onclick="$('#formContact #item').val('<?= $new->SpeName; ?>');" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="background-color: #23527c;color: #fff;padding: 4px;border-radius: 5px; cursor: pointer;">Solicitar</a></span></h3>
                    <p><?= $new->SpeDescription; ?></p>
                </div>
            </li>
            <?php
        }
        ?> 
        <style>
            .modal-backdrop {
                z-index: -2000;
            }
            
            .modal-dialog {
               
                margin: 120px auto;
            }
        </style>
        <div class="modal " id="exampleModal" tabindex="-99999999999" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formPromocionesTitulo')->TxtDescription; ?></h4>
                    </div>
                    <div class="modal-body">
                        <form id="formContact">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formPromocionesTipo')->TxtDescription; ?></label>                                
                                
                                <input type="text" class="form-control" id="item">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formPromocionesNombre')->TxtDescription; ?></label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formPromocionesTelefono')->TxtDescription; ?></label>
                                    <input type="text" class="form-control" id="phone">
                                    <input type="text" value="OFERTAS" class="form-control hidden" id="type">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formPromocionesEmail')->TxtDescription; ?></label>
                                    <input type="text" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formPromocionesMensaje')->TxtDescription; ?></label>
                                    <textarea class="form-control" id="message"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formPromocionesCerrar')->TxtDescription; ?></button>
                            <button onclick="sendRequest();" type="button" class="btn btn-primary"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formPromocionesEnviar')->TxtDescription; ?></button>
                        </div>
                    </div>
                </div>
            </div>



        <?php
    }

}
