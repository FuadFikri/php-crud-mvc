<?php
class Route {
    public static function start() {
        // Default controller and action
        $controller = isset($_GET['controller']) ? $_GET['controller'] : 'main';
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        // Build the controller class name
        $controllerClass = ucfirst($controller) . 'Controller';

        // Load the controller file
        $controllerFile = 'controllers/' . $controllerClass . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            // Instantiate the controller
            if (class_exists($controllerClass)) {
                $controllerInstance = new $controllerClass();

                // Check if the action exists in the controller
                if (method_exists($controllerInstance, $action)) {
                    // Call the action with or without ID parameter
                    if ($id !== null) {
                        $controllerInstance->$action($id);
                    }
                    else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action == 'store') {
                        $controllerInstance->store($_POST);
                    } 
                    else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action == 'update') {
                        $controllerInstance->update($_POST);
                    } 
                    else {
                        $controllerInstance->$action();
                    }
                } else {
                    echo "Action '$action' not found in controller '$controllerClass'.";
                }
            } else {
                echo "Controller class '$controllerClass' not found.";
            }
        } else {
            echo "Controller file for '$controller' not found.";
        }
    }
}
?>
