var cropper;
var req;
var img;
function set_src(file) {
    var src = URL.createObjectURL(file);
    $("#img_load").attr("src", src);
}

function invia_immagine(blob, url){
	req = new XMLHttpRequest();
	req.open("POST", url);
	req.onreadystatechange = function() {
		if (req.responseText.trim() == "0") {
			alert("Dio povero ho caricato l'immagine correttamente");
			close();
		}else{
			console.log(req.readyState + req.responseText);
		}
	};
	var data = new FormData();
	data.append("titolo", img.value);
	data.append("immagine", blob);
	req.send(data);
	
}

function crop_image(image, dim, url) {
	img = image;
	var temp = $("#load-image");
    if (temp.html() == "Conferma") {
        cropper.getCroppedCanvas().toBlob(function(blob) {
                invia_immagine(blob, url);
		});
    }else {
            temp.html("Conferma");
            set_src(image.files[0]);
            var tocrop = $("#img_load");
            tocrop.cropper({
                aspectRatio: dim, //set the dimension of the image based on the image type
                background: false, //hide the background grid
                maxContainerWidth: 400
            });
            cropper = tocrop.data("cropper");
        }
}


