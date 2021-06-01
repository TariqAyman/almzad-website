$(function () {
    $('.button-opener').click(function () {
        document.getElementById("mySidepanel").style.width = "290px";
    });
    $('.closebtn').click(function () {
        document.getElementById("mySidepanel").style.width = "0";
    });

});
/**-----------show scrolling To top button---------------------**/
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        $('#myBtn').fadeIn();
        $('#top').addClass("sticky");
    } else {
        $('#myBtn').fadeOut();
        $('#top').removeClass("sticky");
    }
}

// When the user clicks on the button, scroll to the top of the document
$('#myBtn').click(function () {
    $("html, body").animate({scrollTop: 0}, 400);
    return false;
});
/*--owlCarousel--*/
$('.owl-clints').owlCarousel({
    loop: true,
    items: 3,
    dots: false,
    rtl: true,
    nav: true,
    margin: 10,
    navText: ["<span><i class='fas fa-chevron-left font-16'></i><span>", " <span><i class='fas fa-chevron-right font-16'></i></span>"],
    responsive: {
        0: {
            items: 1
        },
        900: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});
$(document).ready(function () {
    $(".scroll").click(function () {
        var x = $(this).find('.nav-item');
        $('.nav-item').removeClass('active');
        var t = $(this).attr("href");

        $("html, body").animate({
            scrollTop: $(t).offset().top - 120
        }, {
            duration: 1e3,
        });
    });

});
$('.owl-product').owlCarousel({
    loop: true,
    margin: 20,
    items: 3,
    dots: false,
    rtl: true,
    nav: true,
    lazyLoad: true,
    navText: ["<span><i class='fas fa-chevron-left font-16'></i></span>", " <span><i class='fas fa-chevron-right font-16'></i></span>"]
});

function Countdown(node) {
    this.$el = node;
    this.countdown_interval = null;
    this.total_seconds = 0;
    this.init = function () {
        // DOM
        this.$ = {
            days: this.$el.find('.bloc-time.days .figure'),
            hours: this.$el.find('.bloc-time.hours .figure'),
            minutes: this.$el.find('.bloc-time.min .figure'),
            seconds: this.$el.find('.bloc-time.sec .figure')
        };

        // Init countdown values
        this.values = {
            days: this.$.days.parent().attr('data-init-value'),
            hours: this.$.hours.parent().attr('data-init-value'),
            minutes: this.$.minutes.parent().attr('data-init-value'),
            seconds: this.$.seconds.parent().attr('data-init-value'),
        };

        // Initialize total seconds
        this.total_seconds = this.values.days * 60 * 60 * 24 + this.values.hours * 60 * 60 + (this.values.minutes * 60) + this.values.seconds;

        // Animate countdown to the end
        this.count();
    };
    this.count = function () {

        var that = this,
            $days_1 = this.$.days.eq(0),
            $days_2 = this.$.days.eq(1),
            $days_3 = this.$.days.eq(2),
            $hour_1 = this.$.hours.eq(0),
            $hour_2 = this.$.hours.eq(1),
            $hour_3 = this.$.hours.eq(2),
            $min_1 = this.$.minutes.eq(0),
            $min_2 = this.$.minutes.eq(1),
            $min_3 = this.$.minutes.eq(2),
            $sec_1 = this.$.seconds.eq(0),
            $sec_2 = this.$.seconds.eq(1),
            $sec_3 = this.$.seconds.eq(2);

        this.countdown_interval = setInterval(function () {

            if (that.total_seconds > 0) {

                --that.values.seconds;

                if (that.values.minutes >= 0 && that.values.seconds < 0) {

                    that.values.seconds = 59;
                    --that.values.minutes;
                }

                if (that.values.hours >= 0 && that.values.minutes < 0) {

                    that.values.minutes = 59;
                    --that.values.hours;
                }
                if (that.values.days >= 0 && that.values.minutes < 0) {

                    that.values.days = 30;
                    --that.values.days;
                }

                // Update DOM values
                // Hours
                that.checkHour(that.values.days, $days_1, $days_2, $days_3);
                // Hours
                that.checkHour(that.values.hours, $hour_1, $hour_2);

                // Minutes
                that.checkHour(that.values.minutes, $min_1, $min_2);

                // Seconds
                that.checkHour(that.values.seconds, $sec_1, $sec_2);

                --that.total_seconds;
            } else {
                clearInterval(that.countdown_interval);
            }
        }, 1000);
    };
    this.animateFigure = function ($el, value) {
        var that = this,
            $top = $el.find('.top'),
            $bottom = $el.find('.bottom'),
            $back_top = $el.find('.top-back'),
            $back_bottom = $el.find('.bottom-back');

        // Before we begin, change the back value
        $back_top.find('span').html(value);

        // Also change the back bottom value
        $back_bottom.find('span').html(value);

        // Then animate
        TweenMax.to($top, 0.8, {
            rotationX: '-180deg',
            transformPerspective: 300,
            ease: Quart.easeOut,
            onComplete: function () {

                $top.html(value);

                $bottom.html(value);

                TweenMax.set($top, {rotationX: 0});
            }
        });

        TweenMax.to($back_top, 0.8, {
            rotationX: 0,
            transformPerspective: 300,
            ease: Quart.easeOut,
            clearProps: 'all'
        });
    };
    this.checkHour = function (value, $el_1, $el_2, $el_3) {

        var val_1 = value.toString().charAt(0),
            val_2 = value.toString().charAt(1),
            val_3 = value.toString().charAt(2),
            fig_1_value = $el_1.find('.top').html(),
            fig_2_value = $el_2.find('.top').html();

        if ($el_3) {
            fig_3_value = $el_3.find('.top').html();
        }

        if (value >= 100) {

            // Animate only if the figure has changed
            if (fig_1_value !== val_1) this.animateFigure($el_1, val_1);
            if (fig_2_value !== val_2) this.animateFigure($el_2, val_2);
            if (fig_3_value !== val_3) this.animateFigure($el_3, val_3);
        } else if (value >= 10) {

            // Animate only if the figure has changed
            if (fig_1_value !== val_1) this.animateFigure($el_1, val_1);
            if (fig_2_value !== val_2) this.animateFigure($el_2, val_2);
        } else {

            // If we are under 10, replace first figure with 0
            if (fig_1_value !== '0') this.animateFigure($el_1, 0);
            if (fig_2_value !== val_1) this.animateFigure($el_2, val_1);
        }
    }
}

// Let's go !
$total = $('body').attr('data-countdowncount');

for ($count = 0; $count <= $total; $count++) {
    new Countdown($($('.countdown')[$count])).init();
}

//this code for upload pic
$('document').ready(function () {
    $("#file-5").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgshow').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
//confirm password//
$('#newPassword, #confirm_password').on('keyup', function () {
    if ($('#newPassword').val() == $('#confirm_password').val()) {
        $('#message').html('متطابقة').css('color', 'green');
    } else
        $('#message').html('غير متطابقة').css('color', 'red');
});
///
window.onload = function () {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {
        var filesInput = document.getElementById("files");
        filesInput.addEventListener("change", function (event) {
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                //Only pics
                if (!file.type.match('image'))
                    continue;
                var picReader = new FileReader();
                picReader.addEventListener("load", function (event) {
                    var picFile = event.target;
                    var div = document.createElement("div");
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                        "title='" + picFile.name + "'/>";
                    output.insertBefore(div, null);
                });
                //Read the image
                picReader.readAsDataURL(file);
            }
        });
    } else {
        console.log("Your browser does not support File API");
    }
}

function incrementValue(element) {
    var value = parseInt(document.getElementById(element).value, 10);
    value = isNaN(value) ? 0 : value;
    value += 100;
    document.getElementById(element).value = value;
}

function decrementValue(element) {
    var value = parseInt(document.getElementById(element).value, 10);
    value = isNaN(value) ? 0 : value;
    value -= 100;
    document.getElementById(element).value = value;
}
