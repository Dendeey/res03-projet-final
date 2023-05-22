import { hideAndShowMenuOnScroll } from './navbarClientEffects.js';
import { openAndCloseAsideMenu } from './navbarClientEffects.js';
import { validatorContact } from './validator_contact.js';


window.addEventListener('DOMContentLoaded', function() {

    hideAndShowMenuOnScroll();
    openAndCloseAsideMenu();
    validatorContact();

});