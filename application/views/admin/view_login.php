<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url().$favicon->website_favicon;?>"/>
        <title>Login | <?php echo @$title->website_title; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
<!--<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />-->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </head>

    <body style="padding: 50px;">
        <div class="container">
            <?php
                $form_attributes = array('class' => 'myform', 'id' => 'myform');
                $message = $this->session->userdata('exception');
                $session_id = $this->session->userdata('email');
            ?>
            <div class="row">
            <?php echo form_open('check_user', $form_attributes); ?>
                <div class="col-md-4 col-md-offset-4">
                    <div class="row-fluid" style="padding: 30px 0;">
                        <img src="<?php echo base_url() . @$website_logo; ?>" class="img-responsive" width="180" title="logo" alt="logo" style="font-size: 18px;color: blue;">
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Please Login Here</b></h3>
                        </div>

                        <div class="row-fluid">
                        <?php
                        if (isset($message) && $message != '') {
                            echo '<div class="alert alert-danger"><button class="close" data-dismiss="alert">&times;</button>' . $message . '</div>';
                            $this->session->unset_userdata('exception');
                        }
                        ?>
                    </div>
                        <div class="panel-body" style="margin: 30px 0;">
                                <fieldset>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span> 
                                            <input class="form-control" name="email" id="email" placeholder="E-mail" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-lock"></i>
                                            </span> 
                                            <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    </div>
                                    <input class="btn btn-lg btn-success btn-block" id="button" type="submit" value="Login" name="mysubmit_for_login">
                                </fieldset>
                                <br>
                                <fieldset class="demo_info">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Email</th>
                                        <th>Password</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>administrator@gmail.com</td>
                                        <td>123456</td>
                                      </tr>

                                      <tr>
                                        <td>admin@gmail.com</td>
                                        <td>123456</td>
                                      </tr>
                                      
                                       <tr>
                                        <td>writer@gmail.com</td>
                                        <td>123456</td>
                                      </tr>

                                       <tr>
                                        <td>moderator@gmail.com</td>
                                        <td>123456</td>
                                      </tr>

                                    </tbody>
                                  </table>
                        </fieldset>

                        </div>
                    </div>
                    <p><?php echo @$website_footer['copy_right']?></p>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script> 
    </body>
</html>
