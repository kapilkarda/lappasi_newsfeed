<?php
$user_type = $this->session->userdata('user_type');
if (($user_type == 3) || ($user_type == 4)) {
    include("view_left_menu.php");
} else if($user_type==2){
    include("user_left_menu_view.php");
}else if($user_type==1){
    include("modaretor_left_menu_view.php");
}
?>

<aside class="right-side">    
    <section class="content">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="voffset2"></div>


        <?php
        if ($this->session->flashdata('exception')) {
            ?>
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert">&times;</button>
                <?php
                echo "<b>" . $this->session->flashdata('exception'). "</b>";
               
                ?>
            </div>
            <?php
        }
        ?>
                <div class="col-sm-offset-1">
                    <img src="<?php echo site_url() . $user_info['photo']; ?>" class="img-responsive img-thumbnail" width="175">
                    <?php
                        $a = array('method' =>'post');
                        echo form_open_multipart('admin/Photo_upload/user_photo',$a);
                    ?>
                        <input name="user_photo" accept="image/*" type="file" />
                        <input name="user_pic" type="hidden" value="<?php echo $user_info['photo']; ?>" /><br/>
                        <input  type="submit" class=" btn btn-success" value="<?php echo display('upload')?>"/>
                    <?php echo form_close();?>
                </div>


                <div class="panel-body" style="margin: 30px 0;">
                    <?php
                        $a = array('method' =>'post');
                        echo form_open_multipart('admin/Profile/update_user_info',$a);
                    ?>
                    <fieldset>
                            <div class="row single_field">
                                <div class="col-md-4">
                                   <?php echo display('full_name')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="name" value="<?php echo $user_info['name']; ?>" id="name" type="text">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                   <?php echo display('nick_name')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="pen_name" id="short_name" value="<?php echo $user_info['pen_name']; ?>" type="text">
                                </div>
                            </div>

                            
                            <div class="row single_field">
                                <div class="col-md-4">
                                  <?php echo display('email')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="email" id="short_name" value="<?php echo $user_info['email']; ?>" type="email">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('phone')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="mobile" id="mobile_no" value="<?php echo $user_info['mobile']; ?>" type="number">
                                </div>
                            </div>
                           
                            <div class="row single_field">
                                <div class="col-md-4">
                                   <?php echo display('sex')?>
                                </div>
                                <div class="col-md-8">
                                    <input type="radio" name="sex" value="male" <?php $user_info['sex'] == 'male' ? '' : 'selected'; ?>> <?php echo display('male')?>
                                    <input type="radio" name="sex" value="female" <?php $user_info['sex'] == 'female' ? '' : 'selected'; ?>> <?php echo display('female')?>
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                   <?php echo display('blood')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="blood" id="blood" value="<?php echo $user_info['blood']; ?>" type="text">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                   <?php echo display('birth_date')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control datepicker" name="birth_date" id="birth_date" value="<?php echo $user_info['birth_date']; ?>" type="text">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('address_line_one')?>
                                </div>
                                <div class="col-md-8">
                                <!-- <textarea class="form-control"></textarea> -->
                                    <input class="form-control" name="address_one" id="address_one" value="<?php echo $user_info['address_one']; ?>" type="text">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('address_line_two')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control " name="address_two" id="address_two" value="<?php echo $user_info['address_two']; ?>" type="text">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('city')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="city" id="city" value="<?php echo $user_info['city']; ?>">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('state')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="state" id="state" value="<?php echo $user_info['state']; ?>">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('country')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="country" id="country" value="<?php echo $user_info['country']; ?>">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                   <?php echo display('zip')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="zip" id="zip" value="<?php echo $user_info['zip']; ?>">
                                </div>
                            </div>
                            
                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('verification_document_id')?>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control" name="verification_id_no" id="id_card_no" value="<?php echo $user_info['verification_id_no']; ?>">
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('verification_type')?>
                                </div>
                                <div class="col-md-8">
                                <select name="verification_type" class="form-control">
                                    <option value="">--select--</option>
                                    <option value="Driver licence">Driver licence</option>
                                    <option value="National id ">National Id </option>
                                    <option value="Pasport id ">Pasport id </option>
                                </select>
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('login_time')?>
                                </div>
                                <div class="col-md-8">
                                    <?php echo date('l, d M Y h:t:s a', $user_info['login_time']); ?>
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('logout_time')?>
                                </div>
                                <div class="col-md-8">
                                    <?php echo date('l, d M Y h:t:s a', $user_info['logout_time']); ?>
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-4">
                                    <?php echo display('ip_address')?>
                                </div>
                                <div class="col-md-8">
                                    <?php echo $user_info['ip']; ?>
                                </div>
                            </div>

                            <div class="row single_field">
                                <div class="col-md-8 col-md-offset-4">
                                    <input class="btn btn-lg btn-success" id="button" type="submit" value="<?php echo display('update')?>">
                                </div>
                            </div>

                        </fieldset>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </section>
</aside>

