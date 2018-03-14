var changePwd = document.getElementById("change-pwd");
var formPwd = document.getElementById("pwd");
var realName = document.getElementById("real-name");
var changeName = document.getElementById("submit-name");
var frase = document.getElementById("frase");
var changeFrase = document.getElementById("submit-frase");
var cancelPwd = document.getElementById("cancel-pwd");
var inputPwdConfirm = document.getElementById("confirm-pwd");
var inputPwdNew = document.getElementById("new-pwd");
var cancelName = document.getElementById("cancel-name");
var cancelFrase = document.getElementById("cancel-frase");
var subPwd = document.getElementById("submit-pwd");
var image = document.getElementById("image");
//array with values for establish what are the current active "forms" indexes : 0 name, 1 password, 2 sentence 
var active = [0, 0, 0];

var oldName = "";
var oldFrase = "";

function toggleConEdit(elem) {
    if (elem.contentEditable == "true") {
        elem.contentEditable = "false";
        elem.style.cssText = "";
    } else {
        elem.contentEditable = "true";
        elem.style.cssText = "border: 2px solid #BBBBBB; border-radius: 4px";
    }
}

function toggle(elem) {
    if (elem.style.display == "none") {
        elem.style.display = "inline-block";
    } else {
        elem.style.display = "none";
    }
}

function changeValue(elem, text) {
    elem.innerHTML = text;
}

changePwd.onclick = function() {
    $(formPwd).slideToggle();
};

cancelPwd.onclick = function() {
    $(formPwd).slideToggle();
    active[1] = 0;
};

changeName.onclick = function(e) {
    if (!active[0]) {
        active[0] = 1;
        toggle(cancelName);
        toggleConEdit(realName);
        changeValue(e.target, "Conferma");
        oldName = realName.innerHTML;
    } else {
        if (realName.innerHTML != oldName) {
            oldName = realName.innerHTML;
            active[0] = 0;
            var req = new XMLHttpRequest();
            var data = new FormData();
            req.open("POST", "./change.php");
            req.onreadystatechange = function() {
                //4 is a constant , there are 4 status in a XMLHttpRequest object, 4 means DONE 
                if (req.readyState == 4 && req.status == 200) {
                    if (req.responseText == "0") {
                        alert("Nome cambiato correttamente");
                        cancelName.click();
                    } else {
                        alert("Errore durante il cambio del nome");
                        alert(req.responseText);
                    }
                }
            };
            data.append("name", oldName);
            req.send(data);
        } else {
            alert("Per modificare devi inserire un nome diverso!");
        }
    }
}

changeFrase.onclick = function(e) {
    if (!active[2]) {
        active[2] = 1;
        toggle(cancelFrase);
        toggleConEdit(frase);
        changeValue(e.target, "Conferma");
        oldFrase = frase.innerHTML;
    } else {
        if(frase.innerHTML != oldFrase){
            oldFrase = frase.innerHTML;
            active[2] = 0;
            var req = new XMLHttpRequest();
            var data = new FormData();
            req.open("POST", "./change.php");
            req.onreadystatechange = function() {
                //4 is a constant , there are 4 status in a XMLHttpRequest object, 4 means DONE 
                if (req.readyState == 4 && req.status == 200) {
                    if (req.responseText == "0") {
                        alert("Frase cambiata correttamente");            
                        cancelFrase.click();
                    } else {
                        console.log(req.responseText);
                        alert("Errore durante il cambio della frase");
                    }
                }
            };
            data.append("frase", oldFrase);
            req.send(data);
        } else {
            alert("Per modificare devi inserire una frase diversa!");
        }
    }

};

cancelName.onclick = function(e) {
    toggleConEdit(realName);
    changeValue(changeName, "Cambia nome");
    toggle(e.target);
    realName.innerHTML = oldName;
    active[0] = 0;
}

cancelFrase.onclick = function(e) {
    toggleConEdit(frase);
    changeValue(changeFrase, "Cambia frase");
    toggle(e.target);
    frase.innerHTML = oldFrase;
    active[2] = 0;
}

subPwd.onclick = function(){
    if(inputPwdNew.value == inputPwdConfirm.value){
        var req = new XMLHttpRequest();
        var data = new FormData();
        req.open("POST", "change.php");
        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
                if (req.responseText == "0") {
                        alert("Password cambiata correttamente");            
                        cancelPwd.click();
                } else {
                    console.log(req.responseText);
                    alert("Errore durante il cambio della password");
                }
            }
        }
        data.append("pwd", inputPwdNew.value);
        req.send(data);                            
    }
}



document.getElementById("change-image").onclick = function(){
    image.click();
}

document.getElementById("image").onchange = function(){ 
     var file = image.files[0];
        console.log(file);
        if(file != undefined){
            var data = new FormData();
            var req = new XMLHttpRequest();
            data.append("image", file, file.name);
            req.open("POST", "change.php");
            req.onreadystatechange = function(){
                if(req.status == 200){
                    if(req.responseText == "0"){
                        alert("Immagine cambiata correttamente");
                        //location.replace(".");
                    }else{
                        console.log(req.responseText);
                        alert("Errore durante il caricamento dell'immagine");
                    }
                }
            }
            req.send(data);    
        }
        
    }