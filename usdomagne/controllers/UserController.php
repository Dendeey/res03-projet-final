<?php

class UserController extends AbstractController
{

    // Attributs

    private UserManager $manager;

    // Constructor

    public  function __construct()
    {
	    $this->manager = new UserManager
	    (
	        "davidsim_ProjetFinal",
	        "3306",
	        "db.3wa.io",
	        "davidsim",
	        "83c8b946aee433563583381d62aa9c15"
	    );
    }
    

    // METHODES
    
    
    public function adminAccueil()
    {
        $this->renderAdmin("admin-accueil/admin-accueil",[]);
    }

    public function register(array $post) : void
    {

        if (!empty($post['admin-firstname'])
        && !empty($post['admin-lastname'])
        && !empty($post['admin-email'])
        && !empty($post['admin-password'])
        && !empty($post['admin-confirm-pwd'])
        ) {

            if ($post['admin-password'] === $post['admin-confirm-pwd']) 
            {
                if($this->manager->getUserByEmail($post['admin-email']) === null) 
                {
                    $hashedPass = password_hash($this->clean($post['admin-password']), PASSWORD_DEFAULT);
                    $userToAdd = new User($this->clean($post["admin-firstname"]), $this->clean($post["admin-lastname"]), $this->clean($post["admin-email"]), $hashedPass);
                    $this->manager->insertUser($userToAdd);
                    $this->renderAdmin('admin-login/admin-login', []);
                }

                else 
                {
                    $this->renderAdmin('admin-register/admin-register', ['error' => 'Cet Utilisateur existe déjà']);
                    
                }

            }

            else 
            {
                $this->renderAdmin('admin-register/admin-register', ['error' => 'Les mots de passe ne correspondent pas ']);
                
            }
        }

        else 
        {
            $this->renderAdmin('admin-register/admin-register', ['error' => 'Merci de remplir tous les champs']);
            
        }


    }

    public function login(array $post) : void
    {

        if (!empty($post['email']) && !empty($post['password'])) 
        {
            $logEmail = $this->clean($post['email']);
            $passToCheck = $this->clean($post['password']);


            $userToCheck = $this->manager->getUserByEmail($logEmail);


            if ($userToCheck !== null) 
            {
                $hashedPass = $userToCheck->getPassword();

                if (password_verify($passToCheck, $hashedPass)) 
                {
                    $_SESSION['isConnected'] = true;
                    $_SESSION['username'] = $userToCheck->getFirstName();
                    $this->adminAccueil();
                }

                else 
                {
                    $this->renderAdmin('admin-login/admin-login', ['error' => 'Identifiants de connexion incorrects 1']);
                }
            }
            
            else 
            {
                $this->renderAdmin('admin-login/admin-login', ['error' => 'Identifiants de connexion incorrects 2']);
            }
        }

        else 
        {
            $this->renderAdmin('admin-login/admin-login', ['error' => 'Merci de remplir tous les champs de connexion']);
        }

    }
    
    public function logout()
    {
        
        session_destroy();
        
        header('Location: /res03-projet-final/usdomagne');
        
    }
    

}

?>