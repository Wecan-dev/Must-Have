 $(".star-1").hover(function(){
         $(this).addClass("act");
     }, function(){
         $(this).removeClass("act");
     });




$(document).ready(function(){
  var width = window.innerWidth;
  var resolucion = $( window ).width();
  
  if(resolucion <= 1000){
      cargarInclude = 0;
  }
  else{
    $('#collapseOne').addClass('show');
      cargarInclude = 1;
  }
});

let ubicationP = window.pageYOffset;
window.onscroll = function(){
  let ScrollA = window.pageYOffset;
  if(ubicationP >= ScrollA){
    document.getElementById('header').style.top = '0';
  }
  else{
    document.getElementById('header').style.top = '-120px';
  }
  ubicationP = ScrollA;
}



$(function () {
  'use strict'

  $('[data-toggle="offcanvas"]').on('click', function () {
    $('.offcanvas-collapse').toggleClass('open');
    $('body').toggleClass('over')
  })
})

$(function () {
  'use strict'

  $('.nav-link__mobile').on('click', function () {
    $('.offcanvas-collapse').removeClass('open')
    $('.hamburger').removeClass("is-active");
    $('body').removeClass("over");
  })
})

// menu hambuger

$(".hamburger").on("click", function () {
  if (!$(this).hasClass("is-active")) {
    $(this).addClass("is-active")
    $('.navbar-fixed-js').addClass('fixed');
    $('.hamburger-inner').addClass('js-hamburger');
    $('.nav-link').addClass('fixed-color');
  } else {
    $(this).removeClass("is-active")
    if ($(document).scrollTop() <= 70 && ($(window).width() >= 0)) {
      $('.navbar-fixed-js').removeClass('fixed');
      $('.hamburger-inner').removeClass('js-hamburger');
      $('.nav-link').removeClass('fixed-color');
    }
  }
});

$("#vistaList").on("click", function () {
    $(this).addClass("active");
    $('.main-listProducts__item').addClass('productList');
    $('#vistaCuadra').removeClass('active');
});
$("#vistaCuadra").on("click", function () {
  $(this).addClass("active");
  $('.main-listProducts__item').removeClass('productList');
  $('#vistaList').removeClass('active');
});



$(".navbar-buttonModal").on("click", function (){ 
    $('.hamburger-inner').addClass('js-hamburger');
    $('.modalNav').addClass('show');
    $('.hamburger-box').addClass('visible');
    $('.navbar-buttonModal__close').addClass("is-active"); 
});

$(".navbar-buttonModal__close").on("click", function (){ 
  $('.hamburger-inner').addClass('js-hamburger');
  $('.modalNav').removeClass('show');
  $('.hamburger-box').removeClass('visible');
  $(this).removeClass("is-active");
});

// Menú fixed
$(window).scroll(function () {
  if ($(document).scrollTop() > 70 && ($(window).width() >= 0)) {
    $('#header').addClass('fixed');
    $('.logoChange1').css('display','none');
    $('.logoChange2').css('display','block');
  } else {
    $('#header').removeClass('fixed');
    $('.logoChange2').css('display','none');
    $('.logoChange1').css('display','block');
  }
});

var NameShop = $('.item-navSeller__name p').text();

$('#field_namestore').val(NameShop);
$('.woocommerce-noreviews').text('Aún no hay comentarios');
$('.dokan-dashboard-menu .coupons a').html('<i class="fa fa-gift"></i> Cupones');
$('.dokan-dashboard-menu .reports a').html('<i class="fa fa-line-chart"></i> Informes');
$('.dokan-dashboard-menu .reviews a').html('<i class="fa fa-comments-o"></i> Reseñas');
$('.dokan-dashboard-menu .return-request a').html('<i class="fa fa-undo"></i> Solicitud de Devolución');
$('.dokan-dashboard-menu .staffs a').html('<i class="fa fa-users"></i> Personal');
$('.dokan-dashboard-menu .followers a').html('<i class="fa fa-heart"></i> Seguidores');
$('.dokan-dashboard-menu .analytics a').html('<i class="fa fa-area-chart"></i> Analítica');
$('.dokan-dashboard-menu .tools a').html('<i class="fa fa-wrench"></i> Herramientas');
$('.dokan-dashboard-menu .shipping a').html('<i class="fa fa-truck"></i> Envíos');
$('.dokan-dashboard-menu .social a').html('<i class="fa fa-share-alt-square"></i> Perfil social');
$('.dokan-dashboard-menu .seo a').html('<i class="fa fa-globe"></i> SEO de la tienda');
$(".form-row input[name='dokan_migration']").val('Conviértete en un vendedor');
$(".product-listing-top .dokan-add-product-link a:nth-child(2)").html('Importar');
$(".product-listing-top .dokan-add-product-link a:nth-child(3)").html('Exportar');
$(".dokan-report-wrap.informes-wrap ul li:nth-child(1) a").html('Descripción general');
$(".dokan-report-wrap.informes-wrap ul li:nth-child(2) a").html('Ventas por día');
$(".dokan-report-wrap.informes-wrap ul li:nth-child(3) a").html('Más vendidos');
$(".dokan-report-wrap.informes-wrap ul li:nth-child(4) a").html('Ganancias superiores');
$(".dokan-report-wrap.informes-wrap ul li:nth-child(5) a").html('Declaración');
$(".dokan-reports-main.report-right.dokan-right .postbox h3 span").text('Ventas de este mes');
$(".dokan-rma-request-area table thead tr th:nth-child(1)").text('Detalles');
$(".dokan-rma-request-area table thead tr th:nth-child(2)").text('Productos');
$(".dokan-rma-request-area table thead tr th:nth-child(3)").text('Tipo');
$(".dokan-rma-request-area table thead tr th:nth-child(4)").text('Estado');
$(".dokan-rma-request-area table thead tr th:nth-child(5)").text('Última actualización');
$(".dokan-dashboard-content.dokan-staffs-content header span h1 span a").html('<i class="fa fa-user"></i> Añadir nuevo personal');
$(".dokan-table.dokan-table-striped.vendor-staff-table thead tr th:nth-child(1)").text('Nombre');
$(".dokan-table.dokan-table-striped.vendor-staff-table thead tr th:nth-child(2)").text('Correo');
$(".dokan-table.dokan-table-striped.vendor-staff-table thead tr th:nth-child(3)").text('Teléfono');
$(".dokan-table.dokan-table-striped.vendor-staff-table thead tr th:nth-child(4)").text('Fecha de registro');
$(".dokan-dashboard-content h3").text('Seguidores de la tienda');
$(".dokan-table.dokan-table-striped.product-listing-table.dokan-inline-editable-table thead tr th:nth-child(1)").text('Nombre');
$(".dokan-table.dokan-table-striped.product-listing-table.dokan-inline-editable-table thead tr th:nth-child(2)").text('Seguido desde');
$(".dokan-dashboard-content.dokan-withdraw-content article header.dokan-dashboard-header h1").text('Herramientas');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #import header:nth-child(1) h1").text('Importar XML');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #import header:nth-child(2) h1").text('Importar CSV');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #import > p").text('Haga clic en el botón Examinar y elija un archivo XML que desee importar.');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #import > a").text('Importar CSV');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #export header:nth-child(1) h1").text('Exportar XML');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #export header:nth-child(2) h1").text('Exportar CSV');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #export > a").text('Exportar CSV');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #export > p").text('Elija su tipo de producto y haga clic en el botón exportar para exportar todos los datos en formato XML');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #export > form p:nth-child(1) label").text('Todos');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #export > form p:nth-child(2) label").text('Productos');
$(".dokan-dashboard-content.dokan-withdraw-content article #tab-container .tabs_container #export > form p:nth-child(3) label").text('Variaciones');
$("#store-form dokan-form-group:nth-child(12) label").text('Bibliografía');




