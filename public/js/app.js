const addScroll = () => {
    var body = document.body;   
    var scrollPosition = window.scrollY || document.documentElement.scrollTop;
    
    if (scrollPosition > 0) {
        body.classList.add('scroll-down');
    } else {
        body.classList.remove('scroll-down');
    }
}

const validateForm = () => {
    const nameInput = document.getElementById("name");
    const priceInput = document.getElementById("price");
    const descriptionInput = document.getElementById("description");

    nameInput.classList.remove("error");
    priceInput.classList.remove("error");
    descriptionInput.classList.remove("error");

    const priceRegex = /^\d+(\.\d{1,2})?$/;

    let hayErrores = false;

    switch (true) {
        case nameInput.value.trim() === "":
            nameInput.classList.add("error");
            hayErrores = true;
            break;

        case priceInput.value.trim() === "" || !priceRegex.test(priceInput.value.trim()):
            priceInput.classList.add("error");
            hayErrores = true;
            break;

        case descriptionInput.value.trim() === "":
            descriptionInput.classList.add("error");
            hayErrores = true;
            break;
    }

    if (hayErrores) {
        return false;
    }
}

const search = () => {
    console.log('hola');
    const searchbox = document.getElementById('searchbox').value.toUpperCase();
    const storeproduct = document.getElementsByClassName('product__list')[0];
    const product = storeproduct.querySelectorAll(".product");
    
    for (var i = 0; i < product.length; i++) {
        let match = product[i].getElementsByTagName('h2')[0];

        if (match) {
            let textValue = match.textContent || match.innerHTML;
            if (textValue.toUpperCase().indexOf(searchbox) > -1) {
                product[i].style.display = "";
            } else {
                product[i].style.display = "none";
            }
        }
    }
}


function shorterDescrp() {
    const MAX_LENGTH = 20; 
    const descripciones = document.getElementsByClassName('product__description');

    for (let i = 0; i < descripciones.length; i++) {
        const descripcion = descripciones[i].textContent;

        if (descripcion.length > MAX_LENGTH) {
            const descripcionAbreviada = descripcion.slice(0, MAX_LENGTH) + '...';
            descripciones[i].textContent = descripcionAbreviada;
        }
    } 
}

window.addEventListener('load', shorterDescrp);