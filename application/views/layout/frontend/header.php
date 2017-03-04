<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = CI_BASE_URL;
?>
<!doctype html>
<html lang="en">
  <head>
    <?php echo Lib_html_tags::load_meta_data($meta); ?>
      
    <link href="<?php echo $base_url; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/bootstrap/fonts/font-awesome.min.css">
    <link href="<?php echo $base_url; ?>assets/css/star-rating.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>assets/css/style.css" rel="stylesheet">

    <script>
        var ci_base_url = "<?php echo CI_BASE_URL; ?>";
    </script>
    
    <!-- Script -->
    <script src="<?php echo $base_url; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/portfolio/modernizr.custom.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/star-rating.js"></script>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="<?php echo $base_url; ?>assets/img/favicon.png" />
 
    <!-- Google Fonts -->
    <link href="<?php echo $base_url; ?>assets/fonts/aclonica.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>assets/fonts/nothing_you_could_do.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>assets/fonts/signika.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>assets/fonts/signika_300.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

  </head>
  <body data-spy="scroll" data-target=".header">