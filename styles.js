document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

function abrirImagen(ruta) {
    var lightbox = document.createElement("div");
    lightbox.id = "lightbox";
    document.body.appendChild(lightbox);

    var img = document.createElement("img");
    img.src = ruta;
    lightbox.appendChild(img);

    lightbox.addEventListener("click", function() {
        lightbox.remove();
    });
}