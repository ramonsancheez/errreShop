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
    const searchbox = document.getElementById('searchbox').value.toUpperCase();
    const storeproduct = document.getElementById('store-products');
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

const closeAlertModal = () => {
    var body = document.body;
    var alertModal = document.getElementById('alert-modal');
    body.classList.remove('modal-open');
    alertModal.style.display = 'none';
}

const shorterDescrp = () => {
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

const shorterName = () => {
    const MAX_LENGTH = 10; 
    const name = document.getElementsByClassName('product__name');

    for (let i = 0; i < name.length; i++) {
        const nombre = name[i].textContent;

        if (nombre.length > MAX_LENGTH) {
            const nombreAbreviado = nombre.slice(0, MAX_LENGTH) + '...';
            name[i].textContent = nombreAbreviado;
        }
    }
}
document.addEventListener("DOMContentLoaded", function() {
    const prevButton = document.querySelector(".carousel__arrow.prev");
    const nextButton = document.querySelector(".carousel__arrow.next");
    const carouselTrack = document.querySelector(".carousel-track");
    const carouselItems = document.querySelectorAll(".carousel ul li");

    let currentIndex = 0;

    prevButton.addEventListener("click", function() {
        currentIndex = (currentIndex === 0) ? carouselItems.length - 1 : currentIndex - 1;
        updateCarousel();
    });

    nextButton.addEventListener("click", function() {
        currentIndex = (currentIndex === carouselItems.length - 1) ? 0 : currentIndex + 1;
        updateCarousel();
    });

    function updateCarousel() {
        const itemWidth = carouselItems[0].offsetWidth;
        const offset = currentIndex * itemWidth;
        carouselTrack.style.transform = `translateX(-${offset}px)`;
    }
});
  
window.addEventListener('load', function() {
    shorterDescrp();
    shorterName();
});
  
  