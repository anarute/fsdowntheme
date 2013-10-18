jQuery(document).ready(function(){
    var isAnimating = false;

    jQuery("#news-slider-slide-right").click(function(){
        if(!isAnimating){
            isAnimating = true;
            jQuery(".news-slider-item").each(function(i, item){
                jQuery(this).css({'opacity' : '0.5'});
                var left = getPropertyValue(jQuery(this).css("left"));
                
                left = left - 500;
                //console.log(left);
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
        return false;
    });
    
    jQuery("#news-slider-slide-left").click(function(){
        if(!isAnimating){
            isAnimating = true;
            jQuery(".news-slider-item").each(function(i, item){      
                var left = getPropertyValue(jQuery(this).css("left"));
                
                if(left != 0) {
                    jQuery(this).css({'opacity' : '0.5'});
                    left = left + 500;                        
                    
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
});

