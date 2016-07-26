/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */
var urlBase = "http://localhost/hobesound";
// jQuery to collapse the navbar on scroll
function collapseNavbar() {
    //if ($(".navbar").offset().top > 50) {
    //    $(".navbar-fixed-top").addClass("top-nav-collapse");
    //} else {
    //    $(".navbar-fixed-top").removeClass("top-nav-collapse");
    //}
}

$(window).scroll(collapseNavbar);
$(document).ready(collapseNavbar);

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
    $( ".site-header" ).hover(
        function() {
            toggleMenu();
        }, function() {
            toggleMenu();
        }
    );

    $(".site-header .header-toggle").on("click", function (e) {
        e.preventDefault();

        var this_target = $("body"),
            this_menu = $(this).siblings(".header-menu");

        if (this_target.hasClass("active")) {
            this_target.removeClass("active");
            this_menu.find("*").removeAttr("style").removeClass("active");
            toggleMenu();
        } else {
            this_target.addClass("active");
            toggleMenu();
        }
    });

    initSports();
    initHsp();
    initNews();
    initFs();
     toggleSportOverlay();
    initNews();
    initSlideNews();
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
  if ($(this).attr('class') != 'dropdown-toggle active' && $(this).attr('class') != 'dropdown-toggle') {
    $('.navbar-toggle:visible').click();
  }
});

// Google Maps Scripts
var map = null;
// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);
google.maps.event.addDomListener(window, 'resize', function() {
    map.setCenter(new google.maps.LatLng(27.0501182, -80.1565656));
});

function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 13,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(27.0501182, -80.1565656), // New York

        // Disables the default Google Maps UI components
        disableDefaultUI: true,
        scrollwheel: false,
        draggable: true

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.

    };

    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('map');

    // Create the Google Map using out element and options defined above
    map = new google.maps.Map(mapElement, mapOptions);

    // Custom Map Marker Icon - Customize the map-marker.png file to customize your icon
    var image = 'http://localhost/hobesound/Resources/Image/Public/map-marker.png';
    var myLatLng = new google.maps.LatLng(27.049818, -80.215005);
    var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image
    });
    
    var image2 = 'http://localhost/hobesound/Resources/Image/Public/airport.png';
    var myLatLng2 = new google.maps.LatLng(26.6857475,-80.0928165);
    var beachMarker2 = new google.maps.Marker({
        position: myLatLng2,
        map: map,
        icon: image2
    });
    
    var image3 = 'http://localhost/hobesound/Resources/Image/Public/airport.png';
    var myLatLng3 = new google.maps.LatLng(27.1681279,-80.4673226);
    var beachMarker3 = new google.maps.Marker({
        position: myLatLng3,
        map: map,
        icon: image3
    });
    
    
    
    
}

function initSports()
{
    $('#sports-scroll').slick({
        dots: false,
        infinite: true,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });
}

function initHsp()
{
    $('.hsp-items').slick({
        dots: false,
        infinite: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });
}
function initFs()
{
    $('.fs-scroll').slick({
        dots: false,
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        vertical:true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000
    });
}

function initNews() {
    $('.news-items').slick({
        dots: false,
        infinite: true,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });
}

function validarEmail(email) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(email)) {
        swal("Error", "La dirección de correo '" + email + "' es incorrecta", "error");
        return false;
    } else
        return true;
}

function saveContact(errorMesage, Message, lanId) {

    var nombre = $('#contacto-nombre').val();
    var email = $('#contacto-email').val();
    var mensaje = $('#contacto-mensaje').val();

    if (nombre === "" || email === "" || mensaje === "") {
        swal("Alerta!!", "Todos los campos marcados son obligatorios", "warning");
    } else {

        if (validarEmail(email)) {
            swal("Exito", "Ya resivimso su mensaje, en breve le responderemos", "success");
            $.ajax({
                type: "POST",
                url: urlBase + "/Service/Contact/Save",
                data: {Name: nombre, Email: email, Message: mensaje, Language: lanId, Status: 0}
            });
            $('#contacto-nombre').val("");
            $('#contacto-email').val("");
            $('#contacto-mensaje').val("");
        } else {
            alert('mal email');
        }


    }
}

function toggleMenu(){
    $( ".header-menu nav" ).animate({
        height: "toggle"
    }, 300, function() {
        // Animation complete.
    });
}

function toggleSportOverlay()
{
    $( "#sports li a,#tournaments li a" ).hover(
        function(e) {
            console.log(e.currentTarget.rel);
            $( '#sports li a[rel="' + e.currentTarget.rel + '"] .title-overlay').css('display', 'block');
            $( '#tournaments li a[rel="' + e.currentTarget.rel + '"] .title-overlay').css('display', 'block');
        }, function(e) {
            console.log(e.currentTarget.rel);
            $( '#sports li a[rel="' + e.currentTarget.rel + '"] .title-overlay').css('display', 'none');
            $( '#tournaments li a[rel="' + e.currentTarget.rel + '"] .title-overlay').css('display', 'none');
        }
    );
}

function initSlideNews() {
    $('#news .nav-news').slick({
        dots: false,
        infinite: true,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });

    $("#news .nav-news .mas").click(function () {
        $("#news .item-news").removeClass("active");
        $("#news .item-news[rel='" + $(this).attr("rel") + "']").addClass("active");
    });
}