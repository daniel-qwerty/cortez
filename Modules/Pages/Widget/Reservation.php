<?php

class Pages_Widget_Reservation extends Com_Object
{

    private $lan;

    /**
     *
     * @static
     * @access public
     * @return Pages_Widget_Reservation
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


    public function render()
    {
        ?>
        <div id="aux" style="
    position: fixed;
    width: 100%;
    bottom: 0px;
    z-index: 2147483647;
    background: rgba(0, 0, 0, 0.8);
    transition: 0.6s;
    transform:translate(0,100%);
    ">
            <div class="container container-vertical-middle">
                <div class="row vertical-middle">
                    <div class="col-md-12 text-center">
                        <form name="formReservas" id="formReserva"   class="contact-form">
                            <div class="row vertical-middle">
                                <div class="col-md-3 text-light">
                                    <div class="form-group  text-left">
                                        <label><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtLlegada')->TxtDescription; ?></label>
                                        <div class="date-wrapper">
                                            <input type="text" id="checkin" name="datepickerin" size="40" readonly
                                                   class="form-control datepicker"
                                                   placeholder="<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtSeleccioneLlegada')->TxtDescription; ?>"
                                                   required></div>
                                    </div>
                                </div>
                                <div class="col-md-3 text-light">
                                    <div class="form-group text-left">
                                        <label><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtSalida')->TxtDescription; ?></label>
                                        <div class="date-wrapper">
                                            <div class="date-wrapper">
                                                <input type="text" id="checkout" name="datepickerout" size="40" readonly
                                                       class="form-control datepicker"
                                                       placeholder="<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtSeleccioneSalida')->TxtDescription; ?>"
                                                       required></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 text-light">
                                    <div class="form-group text-left">
                                        <label><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtTipoHabitacion')->TxtDescription; ?></label>
                                        <br>
                                        <select name="type" id="tipo">
                                            <?PHP Room_Widget_List::getInstance()->setLan($this->lan)->render(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <label>&nbsp;</label>
                                        <br>
                                        <input onclick="sendReserva('<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formReservaMensaje')->TxtDescription; ?>','<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formReservaTitle')->TxtDescription; ?>','<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formReservaText')->TxtDescription; ?>','<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formReservaBtnOk')->TxtDescription; ?>','<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'formReservaBtnOpciones')->TxtDescription; ?>');" class="btn btn-primary" type="submit"
                                               value="<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'btnReserve')->TxtDescription; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="messages"></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <a class="show-form-res go-top-square" href="javascript:void(0)"> <i class="fa fa-suitcase"></i> <?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'btnReserveAhora')->TxtDescription; ?></a>
        <a class="go-top go-top-square" href="javascript:void(0)"> <i class="fa fa-angle-up"></i> </a>
        <?PHP
    }

}
