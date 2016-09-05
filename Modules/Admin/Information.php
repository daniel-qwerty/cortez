<?PHP

class Admin_Information extends Com_Module_Information {

    public function init() {
        
        $obj = get('userType');
        if($obj == 1){
            
        }
        Com_Helper_Menu::getInstance()->add("Dashboard", "/Admin/Admin", "Dashboard", "th-large");
        Com_Helper_Menu::getInstance()->add("Statistics", "/Admin/Statistics", "Estad&iacute;sticas", "stats");
        
        /**
         * Menu Contenido
         */
        Com_Helper_Menu::getInstance()->add("Content", null, "Contenido", "pencil");
        Com_Helper_Menu::getInstance()->add("Menu", "/Admin/Menu", "Menu", "menu", "Content");
        Com_Helper_Menu::getInstance()->add("Texts", "/Admin/Texts", "Textos", "texts", "Content");
        Com_Helper_Menu::getInstance()->add("Pages", "/Admin/Pages", "P&aacute;ginas", "pages", "Content");
        Com_Helper_Menu::getInstance()->add("SlidesShows", "/Admin/SlideShows", "SlideShow", "slideShow", "Content");
        Com_Helper_Menu::getInstance()->add("Links", "/Admin/Links", "Links", "Links", "Content");
        Com_Helper_Menu::getInstance()->add("Contact", "/Admin/Contact", "Contacto", "contact", "Content");
        Com_Helper_Menu::getInstance()->add("News", "/Admin/News", "Noticias", "Noticias", "Content");
        
        Com_Helper_Menu::getInstance()->add("Services", "/Admin/Services", "Servicios", "Servicios", "Content");
        Com_Helper_Menu::getInstance()->add("Customers", "/Admin/Customers", "Clientes", "Clientes", "Content");
        Com_Helper_Menu::getInstance()->add("Projects", "/Admin/Projects", "Proyectos", "Proyectos", "Content");
        Com_Helper_Menu::getInstance()->add("Certifications", "/Admin/Certifications", "Certificaciones", "Cerrtificaciones", "Content");
        
        
        /**
         * Menu Administracion
         */
        Com_Helper_Menu::getInstance()->add("Administration", null, "Administraci&oacute;n", "cog");
        Com_Helper_Menu::getInstance()->add("Users", "/Admin/Users", "Usuarios", "users", "Administration");
        Com_Helper_Menu::getInstance()->add("Languages", "/Admin/Language", "Idiomas", "languages", "Administration");
        Com_Helper_Menu::getInstance()->add("Configurations", "/Admin/Configurations", "Configuraciones", "configurations", "Administration");
       
        
    }

}
