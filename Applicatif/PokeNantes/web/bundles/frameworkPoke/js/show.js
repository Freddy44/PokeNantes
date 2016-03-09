
    jQuery(function(){
            jQuery('.showall').click(function(){
                  jQuery('.prod').show();
                  jQuery('.prod'+$(this).attr('active')).show();
           });
            jQuery('.show').click(function(){
                  jQuery('.prod').hide();
                  jQuery('.prod'+$(this).attr('target')).show();
            });
    });
