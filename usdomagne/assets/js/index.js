import { hideAndShowMenuOnScroll } from './navbarClientEffects.js';
import { openAndCloseAsideMenu } from './navbarClientEffects.js';


window.addEventListener('DOMContentLoaded', function() {

    hideAndShowMenuOnScroll();
    openAndCloseAsideMenu();

});