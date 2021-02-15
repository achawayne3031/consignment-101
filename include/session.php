

<?php

require_once 'init.php';

session_start();

class Session{

    public static $is_logged = false;
    protected static $user_table = "users";
    protected static $last_activity_table = "last_activity";

    public static function login_user($data){
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['id'] = $data['id'];
        self::is_logged_in();

        redirect('cdashboard.php');
    }

    public function is_logged_in(){
        if(isset($_SESSION['username'])){
           self::$is_logged = true;
        }
    }

    public static function log_user_out(){
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['id']);
        self::$is_logged = false;
        redirect('login.php');
    }


    public function admin_login($data){
        $_SESSION['admin'] = $data['username'];
        redirect('dashboard.php');
    }

    public function start_cookie(){

    }





}




