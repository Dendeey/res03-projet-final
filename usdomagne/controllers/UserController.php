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

    public function authentification()
    {
        
        $this->renderAdmin("authentification", []);
        
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

            if ($post['admin-password'] === $post['admin-confirm-pwd']) {
                if($this->manager->getUserByEmail($post['admin-email']) === null) {
                    $hashedPass = password_hash($post['admin-password'], PASSWORD_DEFAULT);
                    $userToAdd = new User($post["admin-email"], $post["admin-firstname"], $hashedPass);
                    $this->manager->insertUser($userToAdd);
                    $this->render('authentification', []);
                }

                else {
                    $this->render('authentification', ['error' => 'Cet Utilisateur existe déjà']);
                }

            }

            else {
                $this->render('authentification', ['error' => 'Les mots de passe ne correspondent pas ']);
            }
        }

        else {
            $this->render('authentification', ['error' => 'Merci de remplir tous les champs']);
        }


    }

    public function login(array $post) : void
    {

        if (!empty($post['email']) && !empty($post['password'])) {
            $logEmail = $post['email'];
            $passToCheck = $post['password'];


            $userToCheck = $this->manager->getUserByEmail($logEmail);


            $hashedPass = $userToCheck->getPassword();


            if ($userToCheck !== null) {
                if (password_verify($passToCheck, $hashedPass)) {
                    $_SESSION['authentification'] = 'ok';
                    $this->index();
                }

                else {
                    $this->render('authentification', ['error' => 'Identifiants de connexion incorrects 1']);
                }
            }

            else {
                $this->render('authentification', ['error' => 'Identifiants de connexion incorrects 2']);
            }
        }

        else {
            $this->render('authentification', ['error' => 'Merci de remplir tous les champs de connexion']);
        }

    }

}

?>