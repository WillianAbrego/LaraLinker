window.shorter = {
    short_url: () => {
        let long_url = document.getElementById("long_url").value;
        if (shorter.validate_url(long_url)) {
            //procesar con axios
            axios
                .post("/url", {
                    long_url: long_url,
                })
                .then(function (response) {
                    document.getElementById("long_url").value = "";
                    document.getElementById(
                        "short_url_container"
                    ).style.display = "blck";
                    document.getElementById("short_url").value =
                        response.data.short_url;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    },
    copy_url: () => {
        let short_url = document.getElementById("short_url");
        short_url.select();
        short_url.setSelectionRange(0, 99999);
        document.execCommand("copy");
    },
    validate_url: (url) => {
        let status = true;
        if (url.trim() == "") {
            status = false;
            alert("debe colocar url");
        }
        if (!validUrl.isWebUri(url)) {
            status = false;
            alert("url no valida");
        }
        return status;
    },
};