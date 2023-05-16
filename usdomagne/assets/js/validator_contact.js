import Contact from "./models/contact.js";

function validatorContact(){
    
    let form = document.getElementById("contact-form");

    form.addEventListener("submit", function(event){

       let contact = new Contact();

       contact.firstName = document.getElementById("firstname").value;
       contact.lastName = document.getElementById("lastname").value;
       contact.email = document.getElementById("email").value;
       contact.request = document.getElementById("request").value;
       contact.message= document.getElementById("message").value;

       if(!contact.validate())
       {
           event.preventDefault(); // empecher la soumission
           // afficher une erreur sur le formulaire
       }
       else
       {
           // afficher un message de succès dans le formulaire
       }
    });
}

export { validatorContact };
    

