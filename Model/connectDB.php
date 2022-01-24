<?php
class connectDB {
    
    private static $instance = null;

    protected function __construct() { }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new MongoDB\Client("mongodb://localhost:27017");
            self::$instance = self::$instance->phpRestApi;
        }
        return self::$instance;
    }
}
?>