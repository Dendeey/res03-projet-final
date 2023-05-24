import Contact from "/res03-projet-final/usdomagne/assets/js/contact.js";
import AdminLogin from "/res03-projet-final/usdomagne/assets/js/adminLogin.js";

function validatorClientContact() {
    console.log('caca2');
    
    let form = document.getElementById("contact-form");

    form.addEventListener("submit", function(event) {


        console.log('Fonction validator contact');

        let contact = new Contact();

        contact.firstName = document.getElementById("contact-firstname").value;
        contact.lastName = document.getElementById("contact-lastname").value;
        contact.email = document.getElementById("contact-email").value;
        contact.request = document.getElementById("contact-objet").value;
        contact.message = document.getElementById("contact-message").value;

        if (!contact.validate()) {
            event.preventDefault(); // empecher la soumission
            // afficher une erreur sur le formulaire
            console.log('Formulaire faux');
            alert('Veuillez remplir tous les champs.');
        }
        else {
            // afficher un message de succès dans le formulaire
            console.log('Formulaire faux');
            alert('Votre message est bien envoyé!');
        }
    });
}

function validatorAdminLogin() {
    event.preventDefault();
    let form = document.getElementById("login-form");

    form.addEventListener("submit", function(event) {


        console.log('Fonction validator admin login');

        let adminLogin = new AdminLogin();

        adminLogin.firstName = document.getElementById("email-login").value;
        adminLogin.lastName = document.getElementById("password-login").value;
        

        if (!adminLogin.validate()) {
            event.preventDefault(); // empecher la soumission
            // afficher une erreur sur le formulaire
            console.log('Formulaire faux');
            alert('Veuillez remplir tous les champs.');
        }
        else {
            // afficher un message de succès dans le formulaire
            console.log('Formulaire faux');
            alert('Votre message est bien envoyé!');
        }
    });
}

export { validatorClientContact };
export { validatorAdminLogin };
    

