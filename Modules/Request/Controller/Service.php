<?php

class Request_Controller_Service extends Com_Module_Controller_Json {

    public function Save() {
        if ($this->isPost()) {
            $obj = $this->getPostObject();
            //print_r($obj);
            Request_Model_Request::getInstance()->doInsert($obj, null);
            $this->sendEmail($obj);
            echo json_encode(true);
        }
    }

    private function sendEmail($obj) {

        $to = Configurations_Helper_Configuration::getInstance()->getKey('EMAIL_CONTACT');
        $subject = 'SOLICITUD DE '.$obj->Type;
        $message = '<html><body>';
        $message .= '<h3>NOMBRE: </h3>'.$obj->Name.'<br> <h3>EMAIL: </h3>'.$obj->Email.'<br> <h3>TELEFONO: </h3>'.$obj->Phone.'<br> <h3>REQUERIMIENTO: </h3>'.$obj->Item.'<br> <h3>MENSAJE: </h3>'.$obj->Message;
        $message .= '</body></html>';
        $headers = 'From:'.EMAIL_USERNAME . "\r\n" .
                'Reply-To:'.EMAIL_USERNAME. "\r\n" .
                'Content-Type: text/html; charset=ISO-8859-1\r\n';
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

    }

}
