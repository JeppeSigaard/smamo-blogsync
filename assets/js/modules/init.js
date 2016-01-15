
$(function(){
// Indstil ajaxURL og hent options
if($(smamoBlogSync.wrapper).length){

    var w = $(smamoBlogSync.wrapper),
        k = $('#api-key').val(),
        s = $('#api-secret').val();

    smamoBlogSync.ajaxURL = w.attr('data-ajax-url'); 

    w.removeAttr('data-ajax-url');

    $.ajax({
        url : smamoBlogSync.ajaxURL,
        type : 'POST',
        data : {
            action : smamoBlogSync.ajaxAction,
            function : 'get-options',
            key : k,
            secret : s,
        },

        dataType : 'json',
        success : function(response){

            smamoBlogSync.options = response.options;
           
            $('#smamo-blogsync-reset-keys').click(function(){
                smamoBlogSync.generateKeys();
            });
            
            $('');
        },
    });

}
});