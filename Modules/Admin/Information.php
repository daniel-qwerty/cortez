<?PHP

class Admin_Information extends Com_Module_Information
{

    public function init()
    {

        $obj = get('userType');
        if ($obj == 1) {

        }
        // Com_Helper_Menu::getInstance()->add("Dashboard", "/Admin/Admin", "Dashboard", "th-large",null);
        // Com_Helper_Menu::getInstance()->add("Statistics", "/Admin/Statistics", "Estad&iacute;sticas", "stats",null);

        /**
         * Menu 
         */
        Com_Helper_Menu::getInstance()->add("Dash", "/Admin/Admin", "Dashboard", "th-large");
        
        
        /**
         * Menu Contenido
         */
        Com_Helper_Menu::getInstance()->add("Content", null, "Contenido", "pencil");
        Com_Helper_Menu::getInstance()->add("Menu", "/Admin/Menu", "Menu", "menu", "Content");
        Com_Helper_Menu::getInstance()->add("Texts", "/Admin/Texts", "Textos", "texts", "Content");
        Com_Helper_Menu::getInstance()->add("Pages", "/Admin/Pages", "P&aacute;ginas", "pages", "Content");
        Com_Helper_Menu::getInstance()->add("Links", "/Admin/Links", "Links", "Links", "Content");

        //Com_Helper_Menu::getInstance()->add("News", "/Admin/News", "Noticias", "Noticias", "Content");
        //Com_Helper_Menu::getInstance()->add("SlidesShows", "/Admin/SlideShows", "SlideShow", "slideShow", "Content");

        Com_Helper_Menu::getInstance()->add("Habitaciones", "/Admin/Room", "Habitaciones", "Habitaciones", "Content");
        Com_Helper_Menu::getInstance()->add("Salones", "/Admin/Hall", "Salones", "Salones", "Content");
        Com_Helper_Menu::getInstance()->add("Servicios", "/Admin/Services", "Servicios", "Servicios", "Content");
        Com_Helper_Menu::getInstance()->add("Promociones", "/Admin/SpecialOffers", "Promociones", "Promociones", "Content");
        Com_Helper_Menu::getInstance()->add("Opiniones", "/Admin/Reviews", "Opiniones", "Opiniones", "Content");
        Com_Helper_Menu::getInstance()->add("Noticias", "/Admin/Promos", "Noticias", "Noticias", "Content");
        Com_Helper_Menu::getInstance()->add("Imagenes", "/Admin/Images", "Imagenes", "Imagenes", "Content");
        Com_Helper_Menu::getInstance()->add("Historia", "/Admin/History", "Historia", "Historia", "Content");
        Com_Helper_Menu::getInstance()->add("Politicas", "/Admin/Polices", "Politicas", "Politicas", "Content");
        
        /**
         * Menu Motor de reservas
         */
        Com_Helper_Menu::getInstance()->add("Motor", null, "Motor de reservas", "pencil");
        Com_Helper_Menu::getInstance()->add("Imagenes", "/Admin/ImagesEngine", "Imagenes", "imagenes", "Motor");
        Com_Helper_Menu::getInstance()->add("Texts", "/Admin/TextsEngine", "Textos", "texts", "Motor");


        /**
         * Menu Administracion
         */
        Com_Helper_Menu::getInstance()->add("Administration", null, "Administraci&oacute;n", "cog");
        Com_Helper_Menu::getInstance()->add("Seo", "/Admin/Seo", "Seo", "seo", "Administration");
        Com_Helper_Menu::getInstance()->add("Contact", "/Admin/Contact", "Contacto", "contact", "Administration");
        Com_Helper_Menu::getInstance()->add("Users", "/Admin/Users", "Usuarios", "users", "Administration");
        Com_Helper_Menu::getInstance()->add("Languages", "/Admin/Language", "Idiomas", "languages", "Administration"); 
        Com_Helper_Menu::getInstance()->add("Configurations", "/Admin/Configurations", "Configuraciones", "configurations", "Administration");


    }

}
