var width;
var block = $(".block-img");
var cont = $(".contenitore");
var img = $(".img");
var win = $(window);
var node;
var image;
var angleLeft;
var angleRight;
var closer;
var indexImg = 0;
var nodeHeight = 0;
var marginTop = 0;
var content;
var imgHeight;
var marginTopImg;

function resize(){
	if(node!=undefined){
		setChangeImgPosition();
		fixDimension();
	}
}

$(document).ready(function(){
	resize();
});
win.on("resize", function(){
	resize();
});

block.hide();
$(block[0]).show();

/*
*Quando si clicca sul divisore che divide un blocco di immagini dall'altro, viene mostrato il blocco di immagini successivo.
*/
$(".divisor").on("click", function(e){ 
	var temp = $(e.target);
	var toshow = temp.parent().parent().next();
	toshow.slideToggle();
});


/*
*Quando si clicca su un immagine viene mostrato un popup, simile a quello di google immagini, che permette di visualizzare la foto ingrandita.
*/
img.on("click", function(e){
	indexImg = ($(this).parent().index()*25)+($(this).index());
	if(node == undefined){
		node = document.createElement("div");
		$(node).addClass("popup-img");
		content = document.createElement("div");
		$(content).addClass("content");
		angleLeft = createSpan(["fa", "fa-angle-left", "gray", "change-img", "prev", "float-left"]);
		angleRight = createSpan(["fa", "fa-angle-right", "gray", "change-img", "next", "float-right"]);
		closer  = createSpan(["fa", "fa-times", "red", "float-right"]);
		$("body")[0].appendChild(node);
		image = e.target.cloneNode();
		$(image).removeClass("img");
		$(image).addClass("image");
		$(image).removeAttr("height");
		$(image).removeAttr("width");
		node.appendChild(closer);
		node.appendChild(angleLeft);
		node.appendChild(angleRight);
		content.appendChild(image);
		node.appendChild(content);
		fixDimension();
		checkIndex();

		$(angleLeft).on("click", function(){
			changeImg(-1);
		});

		$(angleRight).on("click", function(){
			changeImg(1);
		});

		$(document).on("keypress", function(e){
			switch(e.originalEvent.keyCode){
				case 37:
					changeImg(-1);
					break;
				case 39:
					changeImg(1);
					break;
			}
		});

		$(closer).on("click", function(){
			node.remove();
			node = undefined;
		});
	}
	setChangeImgPosition();
	image.src = e.target.src;
});

function changeImg(offset) {
	var temp = indexImg + offset;
	if(!(temp < 0 || temp == img.length)){
		indexImg = temp;
	}
	image.src = img[indexImg].src;
	checkIndex();
}

/*
*La function createSpan riceve un vettore di classi, e genera un elemento span con tutte le classi contenute nel vettore che riceve come parametro.
*/
function createSpan(classes){
	var span = document.createElement("span");
	for (var i=0; i < classes.length; i++){
		$(span).addClass(classes[i]);
	}
	return span;
}


/*
*Se si clicca sul pulsante prev viene visualizzata l'immagine precedente, nel caso stiamo gia visualizzando la prima immagine, il tasto verrà nascosto.
*/

function checkIndex(){
	if(indexImg == 0){
		$(angleLeft).hide();
	}else if(indexImg == img.length-1){
		$(angleRight).hide();
	} else {
		$(angleLeft).show();
		$(angleRight).show();
	}
}

function setChangeImgPosition(){
	nodeHeight = $(node).height();
	marginTop = (nodeHeight/2)-20;
	$(".change-img").css("margin-top", marginTop);
}

function fixDimension(){
	$(image).removeClass("fix-height");
	$(image).removeClass("fix-width");
	var dimImg = (($(image).width()) / ($(image).height()));
	var dimDivImg = (($(".content").width()) / ($(".content").height()));
	if(dimImg >= dimDivImg){
		$(image).addClass("fix-width");
	}else{
		$(image).addClass("fix-height");
	}
}