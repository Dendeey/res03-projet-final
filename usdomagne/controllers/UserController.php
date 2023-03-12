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
        $this->renderAdmin("admin-accueil",[]);
    }

    public function register(array $post) : void
    {
        var_dump($post);

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
                    $hashedPass = password_hash($post['admin-password'], PASSWORD_DEFAULT);
                    $userToAdd = new User($post["admin-firstname"], $post["admin-lastname"], $post["admin-email"], $hashedPass);
                    $this->manager->insertUser($userToAdd);
                    $this->renderAdmin('admin-login', []);
                }

                else 
                {
                    $this->renderAdmin('admin-register', ['error' => 'Cet Utilisateur existe déjà']);
                    echo 'COMPTE DEJA CREE !';
                }

            }

            else 
            {
                $this->renderAdmin('admin-register', ['error' => 'Les mots de passe ne correspondent pas ']);
                echo 'LES MOTS DE PASSES NE SONT PAS IDENTIQUES !';
            }
        }

        else 
        {
            $this->renderAdmin('admin-register', ['error' => 'Merci de remplir tous les champs']);
            echo 'REMPLIR TOUS LES CHAMPS !';
        }


    }

    public function login(array $post) : void
    {

        if (!empty($post['email']) && !empty($post['password'])) 
        {
            $logEmail = $post['email'];
            $passToCheck = $post['password'];


            $userToCheck = $this->manager->getUserByEmail($logEmail);


            $hashedPass = $userToCheck->getPassword();


            if ($userToCheck !== null) 
            {
                if (password_verify($passToCheck, $hashedPass)) 
                {
                    $_SESSION['admin-login'] = 'ok';
                    $this->adminAccueil();
                }

                else 
                {
                    $this->renderAdmin('admin-login', ['error' => 'Identifiants de connexion incorrects 1']);
                    echo 'IDENTIFIANTS DE CONNEXION PAS BONS !';
                }
            }

            else 
            {
                $this->renderAdmin('admin-login', ['error' => 'Identifiants de connexion incorrects 2']);
                echo 'IDENTIFIANTS DE CONNEXION PAS BONS !';
            }
        }

        else 
        {
            $this->renderAdmin('admin-login', ['error' => 'Merci de remplir tous les champs de connexion']);
            echo 'REMPLIR TOUS LES CHAMPS !';
        }

    }
    

}

?>