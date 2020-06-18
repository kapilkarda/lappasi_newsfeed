<style>
    .message{background:#F00;}
    .x_rectangle{height:70px; width:110px; background:#991D57; margin:0 auto; margin:15px 0; padding:3px; cursor:pointer; border-radius:3px;}
    .y_rectangle{height:100px; width:80px; background:#999; margin:0 auto; padding:3px; cursor:pointer; border-radius:3px;}
    .score{height:80px; width:80px; background:#999; margin:0 auto; margin:10px; padding:3px; cursor:pointer; border-radius:3px;}
    .x_x,.x_y,.s_x,.s_y,.y_y,.y_x{color:#FFF; font-size:14px;}
</style>



<?php
$user_id = $this->session->userdata('id');

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
        <?php
        $message = $this->session->flashdata('message');
        @extract($message);
        ?>

    <?php
        if($this->session->flashdata('exception')){
    ?>
        <div class="row">
            <div class="alert alert-danger fade in">
                <span class="close" data-dismiss="alert">×</span>
                <b><?php echo $this->session->flashdata('exception'); ?></b>
            </div>
        </div>
    <?php
        }
    ?>

        <div class="row-fluid">
            <table border="0">
                <tr>
                    <td>
                        <fieldset onclick="change_type('y_rectangle')"><legend><input type="radio" id="y_rectangle" name="style" value="y_rectangle" /> Y Angle</legend>
                            <p class="y_rectangle">
                                Y :<span class="y_y">600</span>px<br />
                                X :<span class="y_x">400</span>px
                            </p>
                        </fieldset>
                    </td>

                    <td>
                        <fieldset onclick="change_type('x_rectangle')"><legend>
                                <input type="radio" id="x_rectangle" name="style" checked="checked" value="x_rectangle" /> X Angle</legend>
                            <p class="x_rectangle">
                                Y :<span class="x_y">400</span>px<br />
                                X :<span class="x_x">600</span>px
                            </p>
                        </fieldset>
                    </td>

                    <td>
                        <fieldset onclick="change_type('score')"><legend><input type="radio" id="score" name="style" value="score" /> Square</legend>
                            <p class="score">
                                Y :<span class="s_y">400</span>px<br />
                                X :<span class="s_x">400</span>px
                            </p>
                        </fieldset>
                    </td>
                </tr>

            </table>    
        </div>
        <div class="voffset4"></div>
        <div class="row-fluid">
        <?php 
             $attributes = array('class' => 'form-inline');
             echo form_open_multipart('admin/Photo_upload/upload', $attributes);
        ?>
             <table>
                    <tr>
                        <td>
                            <fieldset id="thime">
                                <label>
                                    <span>Height(Y):</span>
                                    <input type="number" name="thime_y" value="135" class="form-control" onkeyup="cng_val(this.value, 'x_rectangle', 'x_y')" />
                                </label>
                                <label>
                                    <span>Width(X):</span>
                                    <input type="number" name="thime_x" value="200" class="form-control" onkeyup="cng_val(this.value, 'x_rectangle', 'x_x')" />
                                </label>
                            </fieldset>
                        </td>

                        <td>
                            <fieldset id="img">
                                <label>
                                    <span>Height(Y):</span>
                                    <input type="number" name="img_y" value="400" class="form-control" onkeyup="cng_val(this.value, 'x_rectangle', 'x_y')" />
                                </label>
                                <label>
                                    <span>Width(X):</span>
                                    <input type="number" name="img_x" value="600" class="form-control" onkeyup="cng_val(this.value, 'x_rectangle', 'x_x')" />
                                </label>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label><?php echo display('name');?></label>
                                    <input type="text" name="picture_name" required class="form-control"/>
                                </div>
                                <div class="col-sm-3">
                                    <label><?php echo display('title');?></label>
                                    <input type="text" name="title" required  class="form-control"/>
                                </div>
                                <div class="col-sm-3">
                                    <label><?php echo display('category');?></label><br>
                                    <select name="category" class="form-control" style="width: 100% !important" required >
                                        <option value="" selected ><?php echo display('select');?></option>
                                        <option value="0">General</option>
                                        <option value="1">Political</option>
                                        <option value="2">Man</option>
                                        <option value="3">Women</option>
                                        <option value="4">Exceptional</option>
                                        <option value="5">Natural</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label><?php echo display('image');?></label><br>
                                        <input type="file" name="image" id="image" required accept="image/*" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <div class="voffset2"></div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group"> 
                                        <input type="submit" value="Upload" class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>
                                <?php echo form_close();?>
                        </div>
                    </section>
                </aside>

                <?php

                    if (@$msg == '' && is_array($message)) {
                        echo"<fieldset>";
                        foreach ($message as $image):
                            echo "<br><img class='img' src='" . base_url() . "{$image}' /> <br> ";
                        endforeach;
                        echo"</fieldset>";
                    }

                ?>
    




