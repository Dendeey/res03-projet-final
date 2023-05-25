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
            return true;
            
        }
        else
        {
            return false;
            
        }
    }


    checkFirstName() {
        if(this.firstName.length > 0){
            return true;
        }
    }

    checkLastName() {
        if(this.lastName.length > 0){
            return true;
        }
    }

    checkEmail() {
    
        // Expression regex
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
        // Vérifier si l'email est valide
        if (emailRegex.test(this.email)) {
            return true; // L'email est valide
        }
    
    }
    
    checkRequest() {
        if(this.request.length > 0){
            return true;
        }
    }
    
    checkMessage() {
        if(this.message.length > 0){
            return true;
        }
    }
    
}