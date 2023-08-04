// Slider pour la section "partenaires" sur la page d'accueil
function partenairesSlider() {

    $(document).ready(function () {
        $('.slider_sponsors_content').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });

}

// Slider pour la section "homepage-carousel" sur la page d'accueil
function mainSlider() {

    // Récupération des éléments du slider
    let slider = document.querySelector(".mainSlider");
    let sliderItems = slider.querySelectorAll(".mainSlider_content");
    let sliderNavPrev = document.querySelector(".mainSlider_btn_prev");
    let sliderNavNext = document.querySelector(".mainSlider_btn_next");
    let currentIndex = 0;

    // Fonction pour afficher le slide suivant
    function showNextSlide() {
        sliderItems[currentIndex].classList.remove("active");
        currentIndex = (currentIndex + 1) % sliderItems.length;
        sliderItems[currentIndex].classList.add("active");
    }

    // Fonction pour afficher le slide précédent
    function showPrevSlide() {
        sliderItems[currentIndex].classList.remove("active");
        currentIndex = (currentIndex - 1 + sliderItems.length) % sliderItems.length;
        sliderItems[currentIndex].classList.add("active");
    }

    // Écouteurs d'événements pour les boutons de navigation
    sliderNavPrev.addEventListener("click", showPrevSlide);
    sliderNavNext.addEventListener("click", showNextSlide);

    // Affichage du premier slide au démarrage
    sliderItems[currentIndex].classList.add("active");
}

export { partenairesSlider };
export { mainSlider };
