<?php
$user_type = $this->session->userdata('user_type');
$nick_name = $this->session->userdata('nick_name');
?>
<header class="header">
    <a href="<?php echo base_url(); ?>users/User_profile" class="logo">
        <?php
            echo $nick_name;
        ?>            
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>
                            <?php
                                echo $this->session->userdata('nick_name');
                            ?>
                        <i class="caret"></i></span>
                    </a>
                    
                    <ul class="dropdown-menu">   
                        <li class="user-footer">
                            <a href="<?php echo base_url(); ?>users/User_profile" class="btn btn-default btn-flat"><?php echo display('profile')?></a>
                            <a href="<?php echo base_url(); ?>users/User_profile/change_password" class="btn btn-default btn-flat"><?php echo display('password_change')?></a>
                            <a href="<?php echo base_url(); ?>users/User_profile/log_out" class="btn btn-default btn-flat"><?php echo display('signout')?>t</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

