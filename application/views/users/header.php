<?php 
    $result = $this->db->select('*')->from("settings")->where('id', 12)->get()->row();
    $title = json_decode($result->details); 
    $results = $this->db->select('*')->from("settings")->where('id', 15)->get()->row();
    $favicon = json_decode($results->details);  
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url().$favicon->website_favicon;?>"/>
        <title><?php echo @$title->website_title;?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url(); ?>assets/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url(); ?>assets/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo base_url(); ?>assets/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url(); ?>assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- tag input -->
        <link href="<?php echo base_url(); ?>assets/tagsinput/jquery.tagsinput.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.<?php echo base_url(); ?>js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!--<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />-->
        <!--<script src="<?php echo base_url(); ?>assets/js/jquery-1.5.2.min.js" type="text/javascript"></script>-->
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/function.js" type="text/javascript"></script> 

    </head>
    <body class="skin-blue">

