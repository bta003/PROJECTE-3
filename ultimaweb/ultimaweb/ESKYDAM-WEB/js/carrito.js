let carrito = [];
let arrayProductes = [];


document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {

    if (localStorage.length != null) {
        carregaDades();
    }

    let esborrarCarrito = document.getElementById('eliminar');
    esborrarCarrito.addEventListener('click', (e) => {

        e.preventDefault();

        if (confirm("Estàs segur que vols buidar el carrito?")) {
            localStorage.clear();
            carrito = [];
            carregaDades();
        }


    })

    let BtnsComprar = document.querySelectorAll('.guardar');
    let imatge, nom, model, preu;

    let myJSON;

    for (i = 0; i < BtnsComprar.length; i++) {

        const producte = {};

        BtnsComprar[i].addEventListener('click', (e) => {

            producte.ref = e.target.parentElement.querySelector('.idmaterial').value;

            if (carrito.find(article => article.ref == producte.ref)) {
                producte.quantitat++;
            } else {
                producte.imatge = e.target.parentElement.querySelector('.image').src;
                producte.nom = e.target.parentElement.querySelector('.name').innerText;
                producte.model = e.target.parentElement.querySelector('.model').innerText;
                producte.preu = e.target.parentElement.querySelector('.price').innerText;
                producte.quantitat = 1;
                carrito.push(producte);

            }

            myJSON = JSON.stringify(carrito);
            localStorage.setItem("compra", myJSON);

            carregaDades();


        })
    }

}

function carregaDades() {
    let clau;
    let info;
    // let preutotal = 0;

    document.getElementById('producte_carrito').innerHTML = "";

    if (localStorage.length > 0) {

        clau = localStorage.key(0);
        info = localStorage.getItem(clau);

        arrayProductes = JSON.parse(info);


        for (i = 0; i < arrayProductes.length; i++) {

            let quantitatlinia = parseFloat(arrayProductes[i].quantitat);
            let preulinia = parseFloat(arrayProductes[i].preu);
            let totallinia = quantitatlinia * preulinia;
            // preutotal = preutotal+totallinia;


            document.getElementById("producte_carrito").innerHTML += `<div class="articleCompra">
                                                                            <img src="${arrayProductes[i].imatge}" alt=""> 
                                                                            <h3>${arrayProductes[i].nom}</h3>
                                                                            <h4>${arrayProductes[i].model}</h4> 
                                                                            <p>${arrayProductes[i].preu}</p>
                                                                            <p>${arrayProductes[i].quantitat}</p>
                                                                            <p>${totallinia}€</p>
                                                                            <input type="button" value="E" id="E" onclick="eliminarRegistre(${i})"> 
                                                                        </div>`;
        }





    }



}


// function eliminarDades() {

//     if (confirm("Estàs segur que vols eliminar?")) {
//         localStorage.clear();
//         carregarDades();
//         eliminarCamps();
//     }


// }


function eliminarRegistre(id) {

    console.log(id);

    if (confirm("Estàs segur de que vols eliminar el producte?")) {
        carrito.splice(id, 1);
        localStorage.setItem("compra", JSON.stringify(carrito));
        carregaDades();
    }



}

