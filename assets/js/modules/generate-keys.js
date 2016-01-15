smamoBlogSync.generateKeys = function(){

    if(confirm('ADVARSEL: Tidligere forbindelser til andre hjemmesider vil blive slettet. Er du sikker på at du vil generere nye nøgler?')){

        $.ajax({
            url : smamoBlogSync.ajaxURL,
            type : 'POST',
            data : {
                'action' : smamoBlogSync.ajaxAction,
                'function' : 'generate-keys',
                'key' : smamoBlogSync.options.api.key,
            },
            dataType : 'json',
            success : function(response){

                smamoBlogSync.options = response.options;

                $('#api-key').val(response.options.api.key);
                $('#api-secret').val(response.options.api.secret);
            },
        });

    }
}
