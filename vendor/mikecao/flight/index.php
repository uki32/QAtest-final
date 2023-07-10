<?php
session_start();
require 'flight/Flight.php';
require 'UsersController.php';
require 'OrdersController.php';
require 'ProductsController.php';
require 'TypesController.php';
require 'LogsController.php';
require 'TablesController.php';

$usersController = new UsersController();
$ordersController = new OrdersController();
$productsController = new ProductsController();
$typesController = new TypesController();
$logsController = new LogsController();
$tablesController = new TablesController();


Flight::route('GET /home', function(){
    Flight::render('home.php');
});
Flight::route('GET /', function() use ($usersController) {
    if(!$usersController->isLogged()){
        Flight::redirect('/login');
    }else{
        if ($usersController->isAdmin()) {
            Flight::redirect('/home');
        } elseif ($usersController->isMod()) {
            Flight::redirect('/home');
        }else{
            Flight::redirect('/shop');
        }    
    }
});
Flight::route('GET /logs', function() use ($logsController) {
    Flight::render('logs-view.php', [
        'logs' =>  $logsController->getLogs(),
    ]);
});


Flight::route('GET /shop', function() use ($ordersController, $usersController) {
    Flight::render('user-panel.php', [
        'products' =>  $ordersController->getProducts(),
        'cartItems' => $ordersController->getCartItems(),
        'logged' => $usersController->isLogged()
    ]);
});



Flight::route('POST /add-product', function() use ($ordersController) {
    $ordersController->addProduct(Flight::request()->data->id);
    Flight::redirect('shop');
});

Flight::route('POST /remove-product', function() use ($ordersController) {
    $ordersController->removeProduct(Flight::request()->data->id);
    Flight::redirect('shop');
});

if ($usersController->isLogged()) { 
    Flight::route('POST /complete-order', function() use ($ordersController) {
        $ordersController->completeOrder(Flight::request()->data->name);
        Flight::redirect('shop');
    });
}

Flight::route('GET /login', function() use ($usersController) {
        Flight::render('login.php', [
            'logged' => $usersController->isLogged()
        ]);    
});

Flight::route('POST /login', function() use ($usersController) {
    $usersController->loginUser(Flight::request()->data->username, Flight::request()->data->password);
    Flight::redirect('/');
});

if ($usersController->isAdmin()) {
    Flight::route('GET /users', function() use ($usersController) {
        Flight::render('admin-panel.php', ['users' => $usersController->getUsers()]);
    });

    Flight::route('GET /users/@id', function($id) use ($usersController) {
        Flight::render('edit-user.php', ['user' => $usersController->getUser($id)]);
    });
    
    Flight::route('POST /users/update/@id', function($id) use ($usersController) {
        $usersController->updateUser($id, Flight::request()->data->password, Flight::request()->data->role);
        Flight::redirect('/users');
    });
    
    Flight::route('POST /users/delete/@id', function($id) use ($usersController) {
        $usersController->deleteUser($id);
        Flight::redirect('/users');
    });
    
    Flight::route('POST /users', function() use ($usersController) {
        $usersController->createUser(
            Flight::request()->data->username, 
            Flight::request()->data->password, 
            Flight::request()->data->role
        );
        Flight::redirect('/users');
    });
}
    if ($usersController->isAdmin() || $usersController->isMod()) {
        Flight::route('GET /products', function() use ($productsController, $typesController) {
            Flight::render('products-panel.php', ['products' => $productsController->getProducts(), 'types'=>$typesController->getTypes()]);
        });
    
        Flight::route('GET /products/@id', function($id) use ($productsController, $typesController) {
            Flight::render('edit-product.php', ['product' => $productsController->getProduct($id), 'types'=>$typesController->getTypes()]);
        });
        
        Flight::route('POST /products/update/@id', function($id) use ($productsController) {
            $productsController->updateProduct($id, Flight::request()->data->type, Flight::request()->data->name,Flight::request()->data->price);
            Flight::redirect('/products');
        });
        
        Flight::route('POST /products/delete/@id', function($id) use ($productsController) {
            $productsController->deleteProduct($id);
            Flight::redirect('/products');
        });
        
        Flight::route('POST /products', function() use ($productsController) {
            $productsController->createProduct(
                Flight::request()->data->name, 
                Flight::request()->data->price, 
                Flight::request()->data->type
            );
            Flight::redirect('/products');
        });

        Flight::route('GET /types', function() use ($typesController) {
            Flight::render('types-panel.php', ['types' => $typesController->getTypes()]);
        });
    
        Flight::route('GET /types/@id', function($id) use ($typesController) {
            Flight::render('edit-type.php', ['type' => $typesController->getTypeById($id)]);
        });
        
        Flight::route('POST /types/update/@id', function($id) use ($typesController) {
            $typesController->updateType($id, Flight::request()->data->name);
            Flight::redirect('/types');
        });
        
        Flight::route('POST /types/delete/@id', function($id) use ($typesController) {
            $typesController->deleteType($id);
            Flight::redirect('/types');
        });
        
        Flight::route('POST /types', function() use ($typesController) {
            $typesController->createType(
                Flight::request()->data->name, 
            );
            Flight::redirect('/types');
        });

        Flight::route('GET /tables', function() use ($tablesController) {
            Flight::render('tables-view.php', [
                'ordersData' =>  $tablesController->getOrdersData(),
                'usersData' => $tablesController->getUsersData(),
                'typesData' => $tablesController->getTypesData(),
                'productsData' => $tablesController->getProductsData(),
            ]);
        });
    }
Flight::start();

