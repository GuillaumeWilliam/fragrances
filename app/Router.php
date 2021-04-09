<?php

// require_once('./models/Driver.php');
// require_once('./models/Categorie.php');
// require_once('./models/Voiture.php');
// require_once('./models/Grade.php');
// require_once('./models/users.php');
// require_once('./models/admin/AdminCategorieModel.php');
// require_once('./controllers/admin/AdminCategorieController.php');
// require_once('./models/admin/AdminVoitureModel.php');
// require_once('./controllers/admin/AdminVoitureController.php');
// require_once('./models/admin/AdminUserModel.php');
// require_once('./controllers/admin/AdminUserController.php');
// require_once('./models/admin/AdminGradeModel.php');
// require_once('./controllers/admin/AdminGradeController.php');
// require_once('./controllers/admin/AuthController.php');
require_once('./app/autoload.php');
class Router{

    private $userController;
    private $productController;

    public function __construct()
    {
        $this->userController = new AdminUserController();
        $this->productController = new AdminProductController();
    }

    public function getPath(){

        if(isset($_GET['action'])){

            switch($_GET['action']){
                case 'list_users':
                    $this->userController->listUsers();
                    break;
                case 'list_products':
                    $this->productController->listProducts();
                    break;
                case 'add_products':
                    $this->productController->addProduct();
                    break;
                case 'del_product':
                    $this->productController->removeProduct();
                    break;
                case 'edit_product':
                    $this->productController->editProduct();
                    break;
                case 'login':
                    $this->userController->Login();
                    break;
                case 'logout':
                    AuthController::logout();
                    break;
                case 'register':
                    $this->userController->SignUp();
                    break;
                case 'del_user':
                    $this->userController->removeUser();
                    break;
                case 'edit_user':
                    $this->userController->editUser();
                    break;
                case 'checkout':
                    $this->productController->checkout();
                    break;
                case 'pay': 
                    $this->productController->payment();
                    break;
                case 'stripe_success': 
                    $this->productController->stripe_success();
                    break;
                case 'about':
                    $this->productController->about();
                    break;
                case 'cg':
                    $this->productController->cg();
                    break;
                case 'contact':
                    $this->productController->contact();
                    break;
            }
            
        }else{
            $this->productController->frontOffice();
        }
    }
}