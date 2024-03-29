/**
 *  Fonction qui permettra de montrer ou cacher le menu au moment du scroll
 */
function hideAndShowMenuOnScroll(){
    
    let prevScrollpos = window.scrollY;

    window.onscroll = function() {
        let currentScrollPos = window.scrollY;
        if (prevScrollpos > currentScrollPos) 
        {
            document.getElementById("client-header").style.top = "0";
        }
        else
        {
            document.getElementById("client-header").style.top = "-16vh";
        }
    
        prevScrollpos = currentScrollPos;
    };
}

/**
 *  Function qui permettra d'ouvrir et fermer le menu aside en cliquant sur le boutton
 */
function openAndCloseAsideMenu(){
    let sideMenuBtn = document.querySelector('.sideMenu-btn');
    let asideMenu = document.querySelector('.sideMenu');
    let sideMenuMobileBtn = document.querySelector('.sideMenuMobile-btn');
    let asideMenuMobile = document.querySelector('.sideMenuMobile');

    if (sideMenuBtn) {
        sideMenuBtn.addEventListener('click', function() {
            sideMenuBtn.classList.toggle('active');
            asideMenu.classList.toggle('active');
        });
    }
    
    if (sideMenuMobileBtn) {
        sideMenuMobileBtn.addEventListener('click', function() {
            sideMenuMobileBtn.classList.toggle('active');
            asideMenuMobile.classList.toggle('active');
        });
    }
    
    
}

export { hideAndShowMenuOnScroll };
export { openAndCloseAsideMenu };
