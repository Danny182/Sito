$(document).ready(function() {
	alert("ciao");
    $("#accordion > li").click(function(){
        if(false == $("ul",this).is(':visible')) {
            $('#accordion ul').slideUp(300);
        }
        $("ul",this).slideToggle(300);
    });
});