<?php

function redirect($url){
    header("Location:{$url}");
}

function solider($i){
    global $session;
    if ($i === 0) {

        if ($session->get_login_status()) {
            redirect("index.php");
        }
    } else {
        if ($i === 1) {
            if (!$session->get_login_status()) {
                redirect("login.php");
            }
        }
    }


    if($i === 2){
        if(($session->get_login_status() || $session->get_login_status()) && $session->rule !=2){

        redirect("index.php");

        }
    }


}

?>