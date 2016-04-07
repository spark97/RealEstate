$(document).ready(function(){       
            var scroll_pos = 0;
            $(document).scroll(function() { 
                scroll_pos = $(this).scrollTop();
                if(scroll_pos > 210) {
                    $(".navbar-inverse").css('background', 'rgba(78, 100, 241, .3)');
                } else {
                    $(".navbar-inverse").css('background', 'rgba(78, 197, 241, .7)');
                }
            });
        });