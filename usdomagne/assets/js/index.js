import { hideAndShowMenuOnScroll } from './navbarClientEffects.js';
import { openAndCloseAsideMenu } from './navbarClientEffects.js';
import { partenairesSlider } from './carousel.js';
// import { mainSlider } from './carousel.js';
import { validatorClientContact } from './validatorContact.js';
// import { validatorAdminLogin } from './validatorContact.js';


window.addEventListener('DOMContentLoaded', function() {

    hideAndShowMenuOnScroll();
    openAndCloseAsideMenu();
    partenairesSlider();
    // mainSlider();
    validatorClientContact();
    // validatorAdminLogin();

});