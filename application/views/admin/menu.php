<?php
$user_type = $this->session->userdata('user_type');
$user_short_name = $this->session->userdata('pen_name');
$chars = "0123456789";


if (($user_type === 3) || ($user_type === 4)) {
    $action_page = "admin/news_post";
} else {
    $action_page = "admin/news_post/user_interface";
}
?>

<header class="header">

    <a href="<?php echo base_url() . $action_page; ?>" class="logo">
        <?php
        if ($user_type == 3) {echo 'Administrator Panel';};
        if ($user_type == 4) {echo 'Admin Panel';};
        if ($user_type == 2) {echo 'Writer Panel';};
        if ($user_type == 1) {echo 'Moderator Panel';};
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
                            
                                echo $this->session->userdata('pen_name');
                            
                            ?>
                        <i class="caret"></i></span>
                    </a>
                    
                    <ul class="dropdown-menu">   
                        <li class="user-footer">
                            <a href="<?php echo base_url(); ?>admin/Profile" class="btn btn-default btn-flat"><?php echo display('profile')?></a>
                            <a href="<?php echo base_url(); ?>admin/Profile/change_password" class="btn btn-default btn-flat"><?php echo display('password_change')?></a>
                            <a href="<?php echo base_url(); ?>admin/Sign_out" class="btn btn-default btn-flat"><?php echo display('signout')?>t</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

