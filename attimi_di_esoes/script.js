var width;
function resize(){
	width = cont.width()/5;
	if(width < 85){
		width = 85;
	}
	img.attr("width", width);
	img.attr("height", width);
}

var cont = $(".contenitore");
var img = $(".img");
var win = $(window);
$(document).ready(function(){
	resize();
});
win.on("resize", function(){
	resize();
});