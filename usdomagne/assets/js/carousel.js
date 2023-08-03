// Slider pour la section "partenaires" sur la page d'accueil
function partenairesSlider() {

    const carouselTrack = document.querySelector('.slider_content');
    const images = carouselTrack.querySelectorAll('.slider_content_item');
    const imageWidth = images[0].getBoundingClientRect().width;
    const numVisibleImages = 3;
    let currentIndex = 0;

    function nextSlide() {
        currentIndex = (currentIndex + 1) % images.length;
        moveCarousel();
    }

    function moveCarousel() {
        carouselTrack.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
    }

    function initCarousel() {
        setInterval(nextSlide, 3000); // Changer d'image toutes les 3 secondes (ajustez selon vos préférences)
    }

    window.addEventListener('load', initCarousel);

}

// Slider pour la section "homepage-carousel" sur la page d'accueil
function mainSlider() {

    // Récupération des éléments du slider
    const slider = document.querySelector(".mainSlider");
    const sliderItems = slider.querySelectorAll(".mainSlider_content");
    const sliderNavPrev = document.querySelector(".mainSlider_btn_prev");
    const sliderNavNext = document.querySelector(".mainSlider_btn_next");
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
