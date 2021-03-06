<?php
/**
 * Description of lib
 *
 * @author Ryno
 */
class Lib_core {
    public $ci = false;
    //--------------------------------------------------------------------------
    public function __construct(){
        $this->ci =& get_instance();
    }
    //--------------------------------------------------------------------------
    public function format_options($options = []){
        return Lib_html_tags::get_html_options($options);
    }
    //--------------------------------------------------------------------------
    public static function load_db($table, $sql = false){
        $class = "db_{$table}";
        $ci = & get_instance();
        $ci->load->library("Lib_db");
        $ci->load->library("db/$class");
        
        $db = new $class;
        if($sql){
            $db->get_fromdb($sql);
        }
        
        return $db;
    }
    //--------------------------------------------------------------------------
}
