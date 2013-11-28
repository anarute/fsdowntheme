jQuery(document).ready(function(){
    var PER_PAGE = 2;
    var MAX_NUM = 5;
    var isAnimating = false;
    var showing = 2;
    var news_number = jQuery('.news-slider-item').size();

    jQuery("#news-slider-slide-right").click(function(){
        news_number = jQuery('.news-slider-item').size();
        if(!isAnimating){
            isAnimating = true;
            if(showing <= MAX_NUM && news_number > showing){
                showing++;
                jQuery(".news-slider-item").each(function(i, item){
                    jQuery(this).css({'opacity' : '0.5'});
                    var left = getPropertyValue(jQuery(this).css("left"));
                    
                    left = left - (jQuery("#news-slider-widget").width()/2);
                    jQuery(this).animate(
                        {
                            'left' : left
                        },
                        500,
                        function(){
                            jQuery(this).css({'opacity' : 1});
                            isAnimating = false;
                        }
                    );
                });
            } else if(showing == news_number && news_number > PER_PAGE){
                showing = PER_PAGE;
                jQuery(".news-slider-item").each(function(i, item){
                    jQuery(this).css({'opacity' : '0.5'});
                    var left = getPropertyValue(jQuery(this).css("left"));
                    
                    left = left + (news_number-PER_PAGE)*(jQuery("#news-slider-widget").width()/2);
                    jQuery(this).animate(
                        {
                            'left' : left
                        },
                        500,
                        function(){
                            jQuery(this).css({'opacity' : 1});
                            isAnimating = false;
                        }
                    );
                });
            }
        }
        return false;
    });
    
    jQuery("#news-slider-slide-left").click(function(){
        news_number = jQuery('.news-slider-item').size();
        if(!isAnimating){
            isAnimating = true;
            if(showing != PER_PAGE) showing--;
            jQuery(".news-slider-item").each(function(i, item){      
                var left = getPropertyValue(jQuery(this).css("left"));
                
                if(left != 0) {
                    jQuery(this).css({'opacity' : '0.5'});
                    left = left + (jQuery("#news-slider-widget").width()/2);
                    jQuery(this)
                        .animate(
                            {
                                'left' : left,
                            },
                            500,
                            function(){
                                jQuery(this).css({'opacity' : 1});
                                isAnimating = false;
                            }
                        );
                } else {
                    isAnimating = false;
                }
            });
        }
        return false;
    });
    
    function getPropertyValue(v){
        return "auto" == v ? 0 : parseInt(v, 10);
    }



    // vir, tentei separar os scripts mas comecei a gastar um tempinho descobrindo como fazer isso
    // então resolvi colocar aqui mesmo mas é bão a gente colocar no featured-tabs.js quando puder

    jQuery(".featured-tabs-post:first-child, .featured-tabs-menu li:first-child").addClass("tab-active");
    jQuery(".featured-tabs-menu-item").click(function( event ){
        event.preventDefault();
        var tabid = jQuery(this).children("a").attr("href");
        
        jQuery(".tab-active").removeClass("tab-active");
        jQuery(this).addClass("tab-active");
        jQuery(tabid).addClass("tab-active");
    });
});

