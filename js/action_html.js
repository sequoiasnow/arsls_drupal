(function($) {
	$(document).ready(function() {
		// Called on document load
		  // Handle the html animation
        (function() {
            // Gives respective elements a first and last class depending
            (function(elems) {
                for (var i = 0; i < elems.first.length; i++) {
                    $(' .action-html .' + elems.first[i] ).each(function() {
                        $(this).addClass('first');
                    });
                }
                for (var i = 0; i < elems.last.length; i++) {
                    $(' .action-html .' + elems.last[i]).each(function() {
                        $(this).addClass('last');
                    });
                }
            })({
                first: ['drop-down'],
                last: ['push-up']
            });
            

            $(window).load(function() {
	            $('#animated-push-reveal .descriptions .reveal').css({
		        	"opacity": 0/*,
		        	"display": "none"	*/
	        	});
	       
	            
                $('#animated-push-reveal').mouseover(function() {
                    $(this).find('.first').find('.item').each(function() {
                        $(this).addClass('hovered');
                    });
                    
                    $('#animated-push-reveal .descriptions .conceal').each(function() {
	               
	                    $(this).animate({
		                    "opacity": 0
	                    }, 1000, function() {
		               //     $(this).css('display', 'none');
	                    });
                    });
                    
                    
                    var elem = this;
                    setTimeout(function() {
                        $(elem).find('.last').find('.item').each(function() {
                            $(this).addClass('hovered');
                        });
                        $(elem).find('.descriptions').find('.reveal').each(function() {
	                        $(this).css('display', 'block');
		                    $(this).animate({
			                    "opacity": 1
		                    }, 1000)
                    	});
                    }, 1500);
                });
            });
        })();


        // Create Questions section of elements
        (function(parallaxContainer) {
            // Configure container size
            $(parallaxContainer).css({
                'width': '100%',
                'height': '50vh'
            });

            // All question marks go in drop down
            var numbQuestionMarks = 40;

            function makeItem(width, height, src) {
                var q = document.createElement('div');
                $(q).addClass('item');
                $(q).css({
                    'width': width + '%',
                    'height': height + '%'
                });

                var i = document.createElement('i');
                $(i).addClass(src);

                $(i).css('font-size', $(q).width() * 2 + 'px');

                q.appendChild(i);

                return q;
            }

            function makeQuestionMark(width, height) {
                return makeItem(width, height, 'fa fa-lightbulb-o')
            }
            function makeLightbulb(width, height) {
                return makeItem(width, height, 'fa fa-exclamation')
            }

            for (var i = 0; i < numbQuestionMarks; i++) {
                var width = Math.random() * 25 + 2,
                    height = Math.random() * 25 + 2;

                var left  = Math.random() * (100 - width),
                    top = Math.random() * (100 - height);

                var q = makeQuestionMark(width, height);
                $(q).css({
                    'left': left + '%',
                    'top': top + '%',
                    'opacity': 0.5 + i / (numbQuestionMarks * 2),
                    'z-index': i
                });

                var l = makeLightbulb(width, height);
                $(l).css({
                    'left': left + '%',
                    'top': top + '%',
                    'opacity': 0.5 + i / (numbQuestionMarks * 2),
                    'z-index': i
                });

                parallaxContainer.getElementsByClassName('push-up')[0].appendChild(l);
                parallaxContainer.getElementsByClassName('drop-down')[0].appendChild(q);
            }

        })(document.getElementsByClassName('action-html')[0]);
	});
})(jQuery);