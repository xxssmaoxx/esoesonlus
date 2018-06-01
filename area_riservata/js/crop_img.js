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
			alert("Immagine caricata correttamente");
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
        		//richiamo la funzione invia_immagine passandogli il blob dell'immagine ritagliata e l'url
                invia_immagine(blob, url);
		});
    }else {
            temp.html("Conferma");
            set_src(image.files[0]);
            var tocrop = $("#img_load");
            tocrop.cropper({
                aspectRatio: dim, //imposto la dimensione della foto
                background: false, //nascondo la griglia di sfondo
                maxContainerWidth: 400
            });
            cropper = tocrop.data("cropper");
        }
}


