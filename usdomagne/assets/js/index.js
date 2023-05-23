import { hideAndShowMenuOnScroll } from './navbarClientEffects.js';
import { openAndCloseAsideMenu } from './navbarClientEffects.js';
// import { validatorContact } from './validatorContact.js';


window.addEventListener('DOMContentLoaded', function() {

    hideAndShowMenuOnScroll();
    openAndCloseAsideMenu();
    // validatorContact();

});