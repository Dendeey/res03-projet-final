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

    // validate() {
    //     if(
    //     this.checkEmail() === true && 
    //     this.checkPassword() === true)
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }

    // checkEmail() {
    
    //     // Expression regex
    //     let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    //     // Vérifier si l'email est valide
    //     if (emailRegex.test(this.email)) {
    //         return true; // L'email est valide
    //     }
    
    // }
    
    // checkPassword() {
    //     if(this.password.length > 0){
    //         return true;
    //     }
    // }
    

}