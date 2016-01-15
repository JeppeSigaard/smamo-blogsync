smamoBlogSync.getSyncList = function(){
    var sync = smamoBlogSync.options.sync;
    
    if(typeof sync !== 'object'){   
    
        return '<li class none>Der er ingen aktive synkroniseringer at vise.</li>';
        
    }
}