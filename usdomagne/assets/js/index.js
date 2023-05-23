import { hideAndShowMenuOnScroll } from './navbarClientEffects.js';
import { openAndCloseAsideMenu } from './navbarClientEffects.js';
import { partenairesSlider } from './carousel.js';
import { mainSlider } from './carousel.js';
// import { validatorContact } from './validatorContact.js';


window.addEventListener('DOMContentLoaded', function() {

    hideAndShowMenuOnScroll();
    openAndCloseAsideMenu();
    partenairesSlider();
    mainSlider();
    // validatorContact();

});