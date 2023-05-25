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


export { partenairesSlider };
