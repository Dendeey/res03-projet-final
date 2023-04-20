/**
 *  Fonction qui permettra de montrer ou cacher le menu au moment du scroll
 */
function hideAndShowMenuOnScroll(){
    
    let prevScrollpos = window.pageYOffset;

    window.onscroll = function() 
    {
        let currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) 
        {
            document.getElementById("client-header").style.top = "0";
        }
        else
        {
            document.getElementById("client-header").style.top = "-16vh";
        }
    
        prevScrollpos = currentScrollPos;
    }
}

/**
 *  Function qui permettra d'ouvrir et fermer le menu aside en cliquant dessus
 */
function openAndCloseAsideMenu(){

    let sideMenuBtn = document.getElementById('sideMenu-btn');

    sideMenuBtn.addEventListener('click', function(){
        
    })
    
}

export { hideAndShowMenuOnScroll };
export { openAndCloseAsideMenu };
