var change, req, select, data, temp, lbl_pagine, confirm, div, old_menu;
change = $(".change-page");

change.on("click", function() {
    old_menu = this.id;
    change.attr("disabled", "true");
    this.style = "background: black;";

    confirm = $("#confirm");
    if (select == undefined) {
        select = document.createElement("select");
        req = new XMLHttpRequest();

        req.open("post", "manage.php");
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                var pages = req.responseText;
                console.log(pages);
                var esatto = JSON.parse(pages.trim());
                for (var giusto in esatto) {
                    var option = document.createElement("option");
                    option.value = esatto[giusto][0];
                    option.innerHTML = esatto[giusto][1];
                    select.appendChild(option);
                }
            }
        };

        data = new FormData();
        data.append("get", "1");
        req.send(data);

        temp = $("#top")[0];
        lbl_pagine = document.createElement("label");
        lbl_pagine.innerHTML = "Seleziona pagina:&nbsp;";
        div = document.createElement("div");
        div.classList = "text-center";
        div.style = "width: 100%";
        div.appendChild(lbl_pagine);
        div.appendChild(select);
        temp.appendChild(div);
        confirm.show();
        confirm.on("click", function() {
            req = new XMLHttpRequest();
            req.open("POST", "manage.php");
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    if (req.responseText == "0") {
                        alert("tut bin");
                        location.href = ".";
                    } else {
                        console.log(req.responseText);
                    }
                }
            };
            data = new FormData();
            data.append("old", old_menu);
            data.append("new", select.value);
            req.send(data);

        });
    }
});