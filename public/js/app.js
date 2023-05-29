const addScroll = () => {
    var body = document.body;   
    var scrollPosition = window.scrollY || document.documentElement.scrollTop;
    
    if (scrollPosition > 0) {
        body.classList.add('scroll-down');
    } else {
        body.classList.remove('scroll-down');
    }
}

const search = () => {
    console.log('hola');
    const searchbox = document.getElementById('searchbox').value.toUpperCase();
    const storeproduct = document.getElementsByClassName('product__list')[0];
    const product = document.querySelectorAll(".product");
    
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

