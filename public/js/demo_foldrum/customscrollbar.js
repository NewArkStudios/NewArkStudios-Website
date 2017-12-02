console.log($);
console.log(gameInstance);
var downloadDone = setInterval(function(){
    if (gameInstance.Module.buildDownloadProgress.downloadData.finished){
        clearInterval(downloadDone)
        console.log(gameInstance.Module.buildDownloadProgress.downloadData.finished)

        // hack unload time is complete when cursor default        
        var unloadDone = setInterval(function(){
           // there is point in unload where code just halts
           console.log('test');
        }, 1000);
    }
}, 1000);
