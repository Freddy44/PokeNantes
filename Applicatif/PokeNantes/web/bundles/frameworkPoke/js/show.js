
    jQuery(function(){
            jQuery('.showall').click(function(){
                  jQuery('.prod').show();
           });
            jQuery('.show').click(function(){
                  jQuery('.prod').hide();
                  jQuery('.prod'+$(this).attr('target')).show();
            });
    });
