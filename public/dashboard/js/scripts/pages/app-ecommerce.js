"use strict";$(function(){var t="ltr";"rtl"==$("html").data("textdirection")&&(t="rtl");var e=$(".sidebar-shop"),o=$(".btn-cart"),s=$(".body-content-overlay"),a=$(".shop-sidebar-toggler"),i=$(".grid-view-btn"),n=$(".list-view-btn"),r=document.getElementById("price-slider"),l=$("#ecommerce-products"),d=$(".dropdown-sort .dropdown-item"),c=$(".dropdown-toggle .active-sorting"),v=$(".btn-wishlist"),m="app-ecommerce-checkout.html";if("laravel"===$("body").attr("data-framework")){var h=$("body").attr("data-asset-path");m=h+"app/ecommerce/checkout"}d.length&&d.on("click",function(){var t=$(this).text();c.text(t)}),a.length&&a.on("click",function(){e.toggleClass("show"),s.toggleClass("show"),$("body").addClass("modal-open")}),s.length&&s.on("click",function(t){e.removeClass("show"),s.removeClass("show"),$("body").removeClass("modal-open")}),void 0!==typeof r&&null!==r&&noUiSlider.create(r,{start:[1500,3500],direction:t,connect:!0,tooltips:[!0,!0],format:wNumb({decimals:0}),range:{min:51,max:5e3}}),i.length&&i.on("click",function(){l.removeClass("list-view").addClass("grid-view"),n.removeClass("active"),i.addClass("active")}),n.length&&n.on("click",function(){l.removeClass("grid-view").addClass("list-view"),i.removeClass("active"),n.addClass("active")}),o.length&&o.on("click",function(e){var o=$(this),s=o.find(".add-to-cart");s.length>0&&e.preventDefault(),s.text("View In Cart").removeClass("add-to-cart").addClass("view-in-cart"),o.attr("href",m),toastr.success("","Added Item In Your Cart 🛒",{closeButton:!0,tapToDismiss:!1,rtl:t})}),v.length&&v.on("click",function(){var e=$(this);e.find("svg").toggleClass("text-danger"),e.find("svg").hasClass("text-danger")&&toastr.success("","Added to wishlist ❤️",{closeButton:!0,tapToDismiss:!1,rtl:t})})}),$(window).on("resize",function(){$(window).outerWidth()>=991&&($(".sidebar-shop").removeClass("show"),$(".body-content-overlay").removeClass("show"))});
