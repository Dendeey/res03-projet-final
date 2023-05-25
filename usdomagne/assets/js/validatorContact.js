import Contact from "./contact.js";
// import AdminLogin from "./adminLogin.js";

function validatorClientContact() {
    
    let form = document.getElementById("contact-form");
    
    if (form) {
        form.addEventListener("submit", function(event) {
    
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
                console.log('Formulaire bon');
                alert('Votre message est bien envoyé!');
            }
        });
    }
    
}

// function validatorAdminLogin() {
//     event.preventDefault();
//     let form = document.getElementById("login-form");
    
//     if (form) {
//         form.addEventListener("submit", function(event) {
    
//             let adminLogin = new AdminLogin();
    
//             adminLogin.firstName = document.getElementById("email-login").value;
//             adminLogin.lastName = document.getElementById("password-login").value;
    
    
//             if (!adminLogin.validate()) {
//                 event.preventDefault(); // empecher la soumission
//                 // afficher une erreur sur le formulaire
//                 console.log('Formulaire faux');
//                 alert('Identifiants incorrects.');
//             }
//             else {
//                 // afficher un message de succès dans le formulaire
//                 console.log('Formulaire bon');
//                 alert('Cliquez sur "Ok" pour vous connecter!');
//             }
//         });
//     }
    
// }

export { validatorClientContact };
// export { validatorAdminLogin };
    

