jQuery(window).ready(function() {
    jQuery("#title-text").fadeIn();
});

jQuery(window).load(function() {
    jQuery("#load-animation").fadeOut(500);
    jQuery("#data").fadeIn(200);
});

function toastLoadedData(val){
    jQuery(window).load(function(){
        Materialize.toast(val+' Data di load', 3000)
    });
}

function toastMessage(val){
    if(val == 1){
        Materialize.toast("Proses Berhasil", 3000);
    } else {
        Materialize.toast("Proses Gagal", 3000);
    }
}