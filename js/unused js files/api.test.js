/* IMPORTANT TO READ : from JavaScript with any of these three ways, I have problems with CORS.
I have only been able to consume the Dyane API with PHP or Postman*/

/* start: updated way to consume an API */
/*     const API_URL = "https://jsonplaceholder.typicode.com";

    const HTMLResponse = document.querySelector("#app");

    const response = await fetch(`${API_URL}/users`)
    .then((response) => response.json())
    .then(json => console.log(json)) */
/* end: updated way to consume an API */

/* start: old way (ajax) of consuming an API */

    /* const API_URL = "https://jsonplaceholder.typicode.com";
    const xhr = new XMLHttpRequest();

    function onRequestHandler() {
        if (this.readyState == 4 && this.status == 200){

            const data = JSON.parse(this.response);
            const HTMLResponse = document.querySelector("#test");

            const tpl = data.map((user) => `<li>${user.name} correo: ${user.email}</li>`);
            HTMLResponse.innerHTML = `<ul>${tpl}</ul>`;
        }
    }

    xhr.addEventListener("load", onRequestHandler);
    xhr.open("GET", `${API_URL}/users`);
    xhr.send(); */

/* end: old way of consuming an API */

/* start: obtain API data with ajax */
    /* const get_data = () => {
        $("#btn_listar").on("click",function () {
            console.info("haciendo pruebas dentro de la función expresada")
    });
        $.ajax({
            method: "GET",
            url: "https://jsonplaceholder.typicode.com/users",
            contentType:"application/json; charset=utf-8",
            data: {}
        }).done(function(info){
            console.log(info);
        })
    } */
/* end: obtain API data with ajax */

