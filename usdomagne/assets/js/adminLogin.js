export default class AdminLogin {
    
    email;
    password;

    constructor(email = "", password ="") {
        
        this.email = email;
        this.password = password;
        
    }

    get email () {
        return this.email;
    }

    set email (email) {
        this.email = email;
    }

    get password () {
        return this.password;
    }

    set password (password) {
        this.password = password;
    }

    validate() {
        if(
        this.checkEmail() === true && 
        this.checkPassword() === true)
        {
            console.log('Login correct!');
            return true;
        }
        else
        {
            console.log('Login pas bon.');
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
    
    checkPassword() {
        if(this.password > 0){
            return true;
        }
        else{
            return false;
        }
    }

}