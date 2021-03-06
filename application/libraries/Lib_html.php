<?php

/*
 * Class 
 * @filename lib 
 * @encoding UTF-8
 * @author Liquid Edge Solutions  * 
 * @copyright Copyright Liquid Edge Solutions. All rights reserved. * 
 * @programmer Ryno van Zyl * 
 * @date 14 Feb 2017 * 
 */

/**
 * Description of lib
 *
 * @author Ryno
 */
class Lib_html extends Lib_core{
    public $container_fluid = false;
    private $form_id = false;
    private $html = [
        "html" => false,
        "form_open" => false,
        "form_close" => false,
        "header" => false,
    ];
    private $menu_html = [];
    //--------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
        $this->ci->load->library("Lib_html_tags");
    }
    //--------------------------------------------------------------------------
    public function form($action, $id = false, $attributes_arr = [], $options = []) {
        $attributes = array_merge([
        ], $attributes_arr);
        
        if(!$id){ $id = "form_".time(); }
        $this->form_id = $id;
        
        $this->add_html("form_open", Lib_html_tags::form_open($action, $id, $attributes, $options));
    }
    //--------------------------------------------------------------------------
    public function end_form() {
        $this->add_html("form_close", Lib_html_tags::form_close());
    }
    //--------------------------------------------------------------------------
    public function fieldset_open($header, $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", Lib_html_tags::fieldset_open($header));
    }
    //--------------------------------------------------------------------------
    public function fieldset_close() {
        $this->add_html("html", Lib_html_tags::fieldset_close());
    }
    //--------------------------------------------------------------------------
    public function header($label, $type = 1, $attributes_arr = []) {
        $attributes = array_merge([
        ], $attributes_arr);
        
        $this->add_html("header", Lib_html_tags::header($label, $type, $attributes));
    }
    //--------------------------------------------------------------------------
    public function itext($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
            "enable_set_value" => false,
        ], $options);
        
        $error = form_error($id);
        if($error){
            $label .= "<div class='form-error-label'>$error</div>";
        }
        $this->add_html("html", Lib_html_tags::itext($label, $id, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function itextarea($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", Lib_html_tags::itextarea($label, $id, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function ihidden($id, $value = false, $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", form_hidden($id, $value));
    }
    //--------------------------------------------------------------------------
    public function ipassword($label, $id, $value = false, $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", Lib_html_tags::ipassword($label, $id, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function iselect($label, $id, $value_arr = [], $value = false, $options = []) {
        $options_arr = array_merge([
        ], $options);
        
        $this->add_html("html", Lib_html_tags::iselect($label, $id, $value_arr, $value, $options_arr));
    }
    //--------------------------------------------------------------------------
    public function add_menu_button($label, $onclick = "javascript:;", $options = []) {
        $options_arr = array_merge([
            "icon" => false
        ], $options);
        $icon = $options_arr["icon"] ? '<i class="fa '.$options_arr["icon"].'" aria-hidden="true"></i> ' : '';
        $this->menu_html[] = '<button onclick="'.$onclick.'" class="btn btn-default margin-right-5" type="button">'.$icon.$label.'</button>';
    }
    //--------------------------------------------------------------------------
    public function add_menu_submitbutton($label, $onclick = false, $options = []) {
        $options_arr = array_merge([
            "icon" => false,
            "attributes" => [
                "class" => "btn btn-default margin-right-5",
                "value" => "Save Changes",
            ],
        ], $options);
        $icon = $options_arr["icon"] ? '<i class="fa '.$options_arr["icon"].'" aria-hidden="true"></i> Save Changes' : '';
        
        if($onclick === false){
            $onclick = "javascript:;";
        }
//        $this->menu_html[] = form_submit($options_arr["attributes"]);
        $this->menu_html[] = '<button onclick="'.$onclick.'" class="btn btn-default margin-right-5 form-submit" formTarget="'.$this->form_id.'" type="button">'.$icon.$label.'</button>';
    }
    //--------------------------------------------------------------------------
    public function build_menu_html() {
        $menu_wrapper= '';
        if(count($this->menu_html) > 0){
            $menu = implode(" ", $this->menu_html);
            $menu_wrapper = "
                <div class='container margin-bottom-10'>
                    <div class='btn-group btn-group-sm' role='group'>
                        $menu
                    </div>
                </div>
            ";
        }
        $this->add_html("header", $menu_wrapper);
    }
    //--------------------------------------------------------------------------
    public function add_html($key, $html) {
        $this->html[$key] .= $html;
    }
    //--------------------------------------------------------------------------
    public function add_column($size) {
        switch ($size) {
            case "full": $this->add_html("html", "<div class='col-md-12'>"); break;
            case "half": $this->add_html("html", "<div class='col-md-6'>"); break;
            case "third": $this->add_html("html", "<div class='col-md-4'>"); break;
            case "quarter": $this->add_html("html", "<div class='col-md-3'>"); break;
        }
    }
    //--------------------------------------------------------------------------
    public function end_column() {
        $this->add_html("html", "</div>");
    }
    //--------------------------------------------------------------------------
    public function container_wrapper($html) {
        $container = $this->container_fluid ? "container-fluid" : "container";
        return "
            <div class='$container'>
                <div class='row'>
                    {$html['form_open']}
                    {$html['header']}
                    {$html['html']}
                    {$html['form_close']}
                </div>
            </div>
        ";
    }
    //--------------------------------------------------------------------------
    public function display() {
        $this->build_menu_html();
        echo $this->container_wrapper($this->html);
    }
    //--------------------------------------------------------------------------
    public static function make() {
        $ci = &get_instance();
        $ci->load->library("Lib_database");
        return $this->ci->db;
    }
    //--------------------------------------------------------------------------
}