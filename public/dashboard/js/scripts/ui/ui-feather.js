$(function(){"use strict";var t=Object.keys(feather.icons),e=$("#icons-search"),a=$("#icons-container"),c="rtl"===$("html").attr("data-textdirection");t.length&&t.map(function(t){a.length&&a.append('<div class="card icon-card cursor-pointer text-center mb-2 mx-50" data-toggle="tooltip" data-placement="top" title="'+t+'" data-icon="<i data-feather=\''+t+'\'></i>"> <div class="card-body"> <div class="icon-wrapper">'+feather.icons[t].toSvg()+'</div><p class="icon-name text-truncate mb-0 mt-1">'+t+"</p> </div></div>")}),e.length&&e.on("keyup",function(){var t=$(this).val().toLowerCase();$(".icon-card").filter(function(){var e=$(this);e.text().toLowerCase().indexOf(t)<!1?e.css("display","none"):e.css("display","block")})}),$(document).on("click",".icon-card",function(){var t,e,o=$(this),i=o.data("icon");a.find(".icon-card.active").removeClass("active"),o.addClass("active"),t=i,(e=document.createElement("input")).value=t,document.body.appendChild(e),e.select(),toastr.success(e.value.split("'")[1],"Icon Name Copied! 📋",{closeButton:!0,tapToDismiss:!1,rtl:c}),document.execCommand("copy"),document.body.removeChild(e)})});
