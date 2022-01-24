<?php
//Autoload classes
spl_autoload_register(function($class_name) {
    if(file_exists('./Model/'.$class_name.'.php')) {
        include_once './Model/'.$class_name.'.php';
    }else if(file_exists('./Controllers/'.$class_name.'.php')) {
        include_once './Controllers/'.$class_name.'.php';
    }else if(file_exists('./Utils/'.$class_name.'.php')) {
        include_once './Utils/'.$class_name.'.php';
    }else if(file_exists('./Api/'.$class_name.'.php')) {
        include_once './Api/'.$class_name.'.php';
    }
    require_once __DIR__ . '/vendor/autoload.php';
});


// $userController = new UsersController();

// $user = new User(null, "Marina", "de Oliveria Mendes", "marina@tutanota.com", "12345");
// $user2 = new User("61eeb415f3ae749b2fb7bfd9", "Lionel", "Messi", "messi@messi.com", "12345");

//print_r($userController->queryAll());
//print_r($userController->queryById("61eeae76f3ae749b2fb7bfd7"));
//print_r($userController->insert($user));
//print_r($userController->delete("61eef056fe08000075001955"));
//print_r($userController->update($user2));

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if($_REQUEST['url']) {
    $url = explode('/', $_REQUEST['url']);
    if($url[0] == 'api') {
        array_shift($url);

        $service = ucfirst($url[0]).'Controller';
        array_shift($url);

        $httpMethod = strtolower($_SERVER['REQUEST_METHOD']);

        try {
            $response = call_user_func_array(array(new $service, $httpMethod), $url);

            echo $response;
            exit;
        } catch (\Exception $th) {
            echo $th->getMessage();
            exit;
        }
    }
}

?>