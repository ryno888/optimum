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
class error_helper {
    //--------------------------------------------------------------------------
    public static function check_errors() {
        $ci = &get_instance();
        $ci->load->helper('file');
        $result_arr = get_filenames(DIR_LOGS);
        $file_html = "";
        if(count($result_arr) > 1){
            foreach ($result_arr as $file) {
                if(strpos($file, "index") === false){
                    $url = CI_BASE_URL."index.php/index/vview_error?file=$file";
                    $file_html .= "<small><a title='Delete Error' class='deleteError cursor-pointer' file='$file'><i class='padding-right-10 fa fa-times' aria-hidden='true'> </i></a><a href='$url' target='_blank'>$file</a></small>";
                }
            }
            
            return "
                <style>
                    .screen{ position: relative; display:none;}
                </style>
                <div class='screen errorPopup'>
                    <div class='wrapper-error-div'>
                        <div class='container-fluid'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='row'>
                                        <blockquote class='blockquote-error'>
                                            <p>New Error</p>
                                            $file_html
                                        </blockquote>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 <script>
                    $(document).ready(function () {
                       fadeIn('.errorPopup');
                    });
                 </script>
            ";
        }
        return false;
    }
    //--------------------------------------------------------------------------
    public static function view($var, $options = []) {
		// options
		$options = array_merge([
			"show_detail" => false,
			"no_formatting" => false,
		], $options);

		// show variable value
		if (!$options["no_formatting"]) echo "<pre>";
		if ($options["show_detail"]) var_dump($var);
		else print_r($var);
		if (!$options["no_formatting"])echo "</pre>";
	}
    //--------------------------------------------------------------------------
}