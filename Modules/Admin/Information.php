<?PHP

class Admin_Information extends Com_Module_Information {

    public function init() {
        
        $obj = get('userType');
        if($obj == 1){
            
        }

        Com_Helper_Menu::getInstance()->add("Statistics", "/Admin/Statistics", "Estad&iacute;sticas", "statistics");
        Com_Helper_Menu::getInstance()->add("Content", null, "Contenido", "content");
        Com_Helper_Menu::getInstance()->add("Menu", "/Admin/Menu", "Menu", "menu", "Content");
        Com_Helper_Menu::getInstance()->add("Texts", "/Admin/Texts", "Textos", "texts", "Content");
        Com_Helper_Menu::getInstance()->add("Pages", "/Admin/Pages", "P&aacute;ginas", "pages", "Content");
        Com_Helper_Menu::getInstance()->add("Contact", "/Admin/Contact", "Contacto", "contact", "Content");
        Com_Helper_Menu::getInstance()->add("SlidesShows", "/Admin/SlideShows", "SlideShow", "slideShow", "Content");
        Com_Helper_Menu::getInstance()->add("Links", "/Admin/Links", "Links", "Links", "Content");
        Com_Helper_Menu::getInstance()->add("Services", "/Admin/Services", "Servicios", "Servicios", "Content");
        Com_Helper_Menu::getInstance()->add("Customers", "/Admin/Customers", "Clientes", "Clientes", "Content");
        Com_Helper_Menu::getInstance()->add("Projects", "/Admin/Projects", "Proyectos", "Proyectos", "Content");
        Com_Helper_Menu::getInstance()->add("Certifications", "/Admin/Certifications", "Certificaciones", "Cerrtificaciones", "Content");
        Com_Helper_Menu::getInstance()->add("News", "/Admin/News", "Noticias", "Noticias", "Content");
        
        /**
         * Menu Administracion
         */
        Com_Helper_Menu::getInstance()->add("Administration", null, "Administraci&oacute;n", "administration");
        Com_Helper_Menu::getInstance()->add("Users", "/Admin/Users", "Usuarios", "users", "Administration");
        Com_Helper_Menu::getInstance()->add("Languages", "/Admin/Language", "Idiomas", "languages", "Administration");
        //Com_Helper_Menu::getInstance()->add("Configurations", "/Admin/Configurations", "Configuraciones", "configurations", "Administration");
       
        /**
         * Panel Items
         */
        Com_Helper_Panel::getInstance()->add("signal", "Estad&iacute;sticas", "/Admin/Statistics");
        Com_Helper_Panel::getInstance()->add("font", "Textos", "/Admin/Texts");
        Com_Helper_Panel::getInstance()->add("link", "Links", "/Admin/Links");
        Com_Helper_Panel::getInstance()->add("list-alt", "Menu", "/Admin/Menu");
        Com_Helper_Panel::getInstance()->add("align-justify", "P&aacute;ginas", "/Admin/Pages");
        Com_Helper_Panel::getInstance()->add("picture", "SlideShows", "/Admin/SlideShows");
        Com_Helper_Panel::getInstance()->add("calendar", "Eventos", "/Admin/Calendar");
        Com_Helper_Panel::getInstance()->add("picture", "Galeria Real State", "/Admin/Gallery2");
        Com_Helper_Panel::getInstance()->add("star", "Life Style", "/Admin/Life");
        Com_Helper_Panel::getInstance()->add("bookmark", "Preserv", "/Admin/Preserv");
        Com_Helper_Panel::getInstance()->add("file", "Noticias", "/Admin/News");
        Com_Helper_Panel::getInstance()->add("inbox", "Contacto", "/Admin/Contact");
        Com_Helper_Panel::getInstance()->add("flash", "Sport", "/Admin/Sports");
        
    }

}
