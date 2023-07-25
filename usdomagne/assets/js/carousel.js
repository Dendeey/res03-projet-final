// Slider pour la section "partenaires" sur la page d'accueil
function partenairesSlider() {
    
    // Ajouter un évènement au click sur les bouttons précédent et suivant 
    let previousBtn = document.querySelector('.slider_btn_prev');
    if (previousBtn) {
        previousBtn.addEventListener('click', function() {
    
            // Récupérer la largeur de l'élément pour ensuite l'ajouter au moment du click
            let figureWitdh = document.querySelector('.slider_content_item').offsetWidth;
            document.querySelector('.slider_content').scrollLeft -= figureWitdh;
        });
    }
    

    let nextBtn = document.querySelector('.slider_btn_next');
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            let figureWitdh = document.querySelector('.slider_content_item').offsetWidth;
            document.querySelector('.slider_content').scrollLeft += figureWitdh;
        });
    }
    

}

// Slider pour la section "homepage-carousel" sur la page d'accueil
function mainSlider(){

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
