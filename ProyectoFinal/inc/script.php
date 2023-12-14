<script>
    // Espera hasta que el DOM esté completamente cargado
    document.addEventListener('DOMContentLoaded', () => {

        // Obtiene todos los elementos con la clase "navbar-burger"
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Verifica si existen elementos "navbar-burger"
        if ($navbarBurgers.length > 0) {

             // Agrega un evento de clic a cada uno de ellos
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {

                // Obtiene el objetivo del atributo "data-target"
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Alterna la clase "is-active" en "navbar-burger" y "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

                });
            });
        }
    });
</script>
<script src="./js/ajax.js"></script>