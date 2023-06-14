var lp = $("#lihatpass");
var pf = $("#passform");
lp.on("change", function(){
    if(pf.attr("type") == "password"){
        pf.attr("type", "text");
    }else{
        pf.attr("type", "password");
    }
});