<?php
require './vendor/autoload.php';

class AdminProductController{

    private $product; // defining a variable to assign it to its model!

    public function __construct()
    {
        $this->product = new AdminProductModel();
    }

    public function listProducts(){
        AuthController::isLogged();
        //var_dump($_POST);
            $allProducts = $this->product->getProducts();
            require_once('./views/admin/products/AdminProductsItems.php');
    }

    public function addProduct(){
        AuthController::isLogged();

        if(isset($_POST['submitted']) ){
            // && !empty($_POST['marque']) && !empty($_POST['prix'])
            $name = trim(htmlentities(addslashes($_POST['name'])));
            $description = trim(htmlentities(addslashes($_POST['description'])));
            $quantity = trim(htmlentities(addslashes($_POST['quantity'])));
            $price = trim(htmlentities(addslashes($_POST['price'])));
            $image = $_FILES['image']['name'];

            $newProduct = new Product();
            $newProduct->setName($name);
            $newProduct->setDescription($description);
            $newProduct->setQuantity($quantity);
            $newProduct->setPrice($price);
            $newProduct->setImage($image);

            $destination = './assets/images/';
            move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
            $ok = $this->product->insertProduct($newProduct);
            if($ok){
                header('location:index.php?action=list_products');
            }
        }
        //affichage du formulaire
    //    $tabCat = $this->adcat->getCategories();
        require_once('./views/admin/products/adminAddProduct.php');
    }

    public function removeProduct(){
        AuthController::isLogged();
        // AuthController::accessUser();
       if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
           $id = $_GET['id'];
           $deleteProduct = new Product();
           $deleteProduct->setId($id);
           $nb = $this->product->deleteProduct($deleteProduct);

           if($nb > 0){
               header('location:index.php?action=list_products');
           }
           
       } 
    }

    public function editProduct(){
        AuthController::isLogged();
        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = $_GET['id'];
            $editProduct = new Product();
            $editProduct->setId($id);
            $productEdition = $this->product->productItem($editProduct);
           
           if(isset($_POST['submitted'])){
               $id = trim(htmlentities(addslashes($_POST['id'])));
               $name = trim(htmlentities(addslashes($_POST['name'])));
               $description = trim(htmlentities(addslashes($_POST['description'])));
               $quantity = trim(htmlentities(addslashes($_POST['quantity'])));
               $price = trim(htmlentities(addslashes($_POST['price'])));
               $image = $_FILES['image']['name'];
               
               $productEdition->setName($name);
               $productEdition->setDescription($description);
               $productEdition->setQuantity($quantity);
               $productEdition->setPrice($price);
               $productEdition->setImage($image);
               
               $destination = './assets/images/';
               move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
               $ok = $this->product->updateProduct($productEdition);
               if($ok > 0){
                   header('location:index.php?action=list_products');
                }
            }
            require_once('./views/admin/products/editProduct.php');
        }
    }

    public function frontOffice(){
        $allProducts = $this->product->getProducts();

        $productsAmount = count($allProducts);
        if ($productsAmount > 4){
            $productsAmount = 4;
        }

        require_once('./views/public/main.php');
    }

    public function checkout(){
        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = $_GET['id'];
            $editProduct = new Product();
            $editProduct->setId($id);
            $productEdition = $this->product->productItem($editProduct);
            require_once('./views/public/checkout.php');
            
        }else{
            // require_once('./views/public/main.php');
            header('Location: index.php');
        }
    }

    public function payment(){

        if(isset($_POST) && !empty($_POST['email']) && !empty($_POST['quantity'])){
         \Stripe\Stripe::setApiKey('sk_test_51IcbyxAHDrsAEQyVG9lzQe64inxnYbCojcNca06VosuEz5wbeikqSzf0gE99a1DOtgnzNknQ1lIWCzS7ilqrynyJ00epK6uNFM');
 
        header('Content-Type: application/json');
 
        $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
            'currency' => 'eur',
            'unit_amount' => $_POST['price']*100,
            'product_data' => [
                'name' => $_POST['name'],
                'images' => ["./assets/images/clio2.jpg"],
            ],
            ],
            'quantity' => $_POST['quantity'],
        ]],
        'customer_email'=> $_POST['email'],
        'mode' => 'payment',
        'success_url' => 'http://localhost/php/poo/apps/fragrances/index.php?action=stripe_success&id='.$_POST['id'].'&quantity='.$_POST['quantity'],
        'cancel_url' => 'http://localhost/php/poo/apps/fragrances/index.php?action=checkout&id='.$_POST['id'],
        ]);
        $_SESSION['pay'] = $_POST;
        echo json_encode(['id' => $checkout_session->id]);
       }
    }

    public function stripe_success(){
        if(isset($_GET['id']) && isset($_GET['quantity'])){
           $id = $_GET['id'];
           $editProduct = new Product();
           $editProduct->setId($id);
           $productEdition = $this->product->productItem($editProduct);
           $currentQuantity = $productEdition->getQuantity();
           $newQuantity = $currentQuantity - $_GET['quantity'];
           $productEdition->setQuantity($newQuantity);
           $this->product->updateProduct($productEdition);
        }
        header('Location: index.php?payment_success=true');
    }

    public function about(){
        require_once('./views/public/about.php');
    }

    public function cg(){
        require_once('./views/public/cg.php');
    }

    public function contact(){
        require_once('./views/public/contact.php');
    }

}