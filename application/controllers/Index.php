<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    //--------------------------------------------------------------------------
	public function page_not_found() {
        $this->load->view('layout/web/header');
        $this->load->view('errors/cli/error_404');
        $this->load->view('layout/web/footer');
    }
    //--------------------------------------------------------------------------
    public function xhome() {
        http_helper::redirect("index.php/index/vhome");
    }
    //--------------------------------------------------------------------------
    public function vhome() {
        $data["base_url"] = CI_BASE_URL;
        $this->load_view('index/vhome', "frontend", $data);
    }
    //--------------------------------------------------------------------------
    public function verror() {
        $this->load_view('errors/error', "web");
    }
    //--------------------------------------------------------------------------
    public function vview_error() {
        $file = $this->input->get_post('file');
        $data["error"] = file_get_contents(DIR_LOGS."$file");
        $this->load->view('errors/view_error', $data);
    }
    //--------------------------------------------------------------------------
    public function xlogin() {
        //add the header here
        $per_usernamme = $this->input->get_post('per_usernamme');
        $per_password = $this->input->get_post('per_password');
        $result = Lib_user::login($per_usernamme, $per_password);
        echo $result ? http_helper::json(["code"=> 1]) : http_helper::json(["code"=> 2, "title" => "Username & Password incorrect", "message" => "The username and password combination you have used is incorrect. Please try again."]);
    }
    //--------------------------------------------------------------------------
    public function xlogin_fb() {
        $username = $this->input->get_post('username');
        $password = $this->input->get_post('password');
        $result = com_user::login($username, $password);
        echo $result ? "true" : "false";
    }
    //--------------------------------------------------------------------------
    public function xlogout() {
        $session = Lib_session::get_session();
        $session->sess_destroy();
        http_helper::go_home();
    }
    //--------------------------------------------------------------------------
    public function xclear_error() {
        //add the header here
        $file = $this->input->get_post('file');
        if(file_exists(DIR_LOGS."$file")){
            unlink(DIR_LOGS."$file");
        }
        
        $error_html = error_helper::check_errors();
        
        http_helper::json($error_html);
    }
    //--------------------------------------------------------------------------
}
