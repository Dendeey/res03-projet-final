export default class Contact {
    
    lastName;
    firstName;
    email;
    request;
    message;

    constructor(lastName = "", firstName = "", email = "", request = "", message = "") {
        this.firstName = firstName;
        this.lastName = lastName;
        this.email = email;
        this.request = request;
        this.message = message;
    }

    get firstName () {
      return this.firstName;
    }

    set firstName (firstName) {
        this.firstName = firstName;
    }

    get lastName () {
        return this.lastName;
    }

    set lastName (lastName) {
        this.lastName = lastName;
    }

    get email () {
        return this.email;
    }

    set email (email) {
        this.email = email;
    }

    get request () {
        return this.request;
    }

    set request (request) {
        this.request = request;
    }

    get message () {
        return this.message;
    }

    set message (message) {
        this.message = message;
    }

    validate() {
        if(this.checkFirstName() === true &&
        this.checkLastName() === true &&
        this.checkEmail() === true && 
        this.checkRequest() === true && 
        this.checkMessage() === true)
        {
            console.log('Bon !');
            return true;
            
        }
        else
        {
            console.log('Pas bon !');
            return false;
            
        }
    }


    checkFirstName() {
        if(this.firstName > 0){
            return true;
        }
        else{
            
            return false;
        }
    }

    checkLastName() {
        if(this.lastName > 0){
            return true;
        }
        else{
            
            return false;
        }
    }

    checkEmail() {
    
        // Expression regex
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
        // Vérifier si l'email est valide
        if (emailRegex.test(this.email)) {
            return true; // L'email est valide
        }
        else {
            return false; // L'email est invalide
        }
    
    }
    
    checkRequest() {
        if(this.request > 0){
            return true;
        }
        else{
            
            return false;
        }
    }
    
    checkMessage() {
        if(this.message > 0){
            return true;
        }
        else{
            
            return false;
        }
    }
}