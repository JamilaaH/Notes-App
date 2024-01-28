<?php

require_once "framework/Controller.php";
require_once "framework/View.php";
require_once "model/User.php";

class ControllerSettings extends Controller {
    
    // à modifier par user courant avant remise
    public function settings() : void {
        $user = User::get_user_by_id(2);

        (new View("settings"))->show(["user" => $user]);
    }

    public function index() : void {
        (new View("index"))->show();
    }
}



