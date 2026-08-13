<?php

class Session {
    private $signed_in;
    public $user_id;

    public function __construct() {
        session_start();
        $this->check_the_login();
    }

    /** 
     * A getter method to check if the user is signed in
     * @return bool
     */
    public function is_signed_in() { 
        return $this->signed_in;
    }

    /**
     * A method to log the user out
     * @return void
     */
    public function login($user) {
        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }

    /**
     * A method to log the user out 
     * @return void
     */
    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

    /**
     * Check if the user is logged in and set the session variables accordingly
     * If the user is not logged in, unset the session variables
     * and set the signed_in property to false
     * @return void
     */
    private function check_the_login() {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
}

$session = new Session();

?>