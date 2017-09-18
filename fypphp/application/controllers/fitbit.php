<?php

defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
//4X2RWX


class fitbit extends CI_Controller {

function loadImg($id){
        $this->load->model("imageUploads");
        $rec = $this->imageUploads->getimage($id);
        $this->output->set_header('Content-type: image/test');
        echo $rec;
    }



    function __Construct() {
        parent::__Construct();
        $_SESSION['access_token'] = $_POST['access_token'];
        $_SESSION['user_id'] = $_POST['uid'];
        $oauth_profile_header = ["Authorization: Bearer " . $_SESSION['access_token']];
        $url = "https://api.fitbit.com/1/user/-/profile.json";
        $cu = curl_init($url);
        curl_setopt($cu, CURLOPT_HTTPHEADER, $oauth_profile_header);
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($cu);
        curl_close($cu);

        $dbconnect = $this->load->database();
        $this->load->model('fitbit_item');
        $this->data['abc'] = $this->fitbit_item->get_item($_SESSION['access_token'], $_SESSION['user_id'] , $result);
        $this->load->controller('welcome');

        echo ($this->data['abc']);
    }

    public function index() {
//        $this->load->view('livesearch');



    }


}




 ?>
