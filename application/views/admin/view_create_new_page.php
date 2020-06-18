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

        <?php

            if($this->session->flashdata('message')){
        ?>
            <div class="row">
                <div class="alert alert-success fade in">
                    <span class="close" data-dismiss="alert">×</span>
                    <b><?php echo $this->session->flashdata('message'); ?></b>
                </div>
            </div>

        <?php
            }

        $attributes = array( 'method'=>'post', 'name' => 'myform');
        echo form_open_multipart('admin/Page/Save_page', $attributes);
        ?>

        <div class="row">
            <div class="col-lg-6">
                    <tr>
                        <th><?php echo display('photo')?> : </th>
                        <td>
                            <input type="file" name="image" accept="image/*" class="form-control"/>
                        </td>
                    </tr>
            </div>
            <div class="col-lg-6">
                    <tr>
                        <th><?php echo display('video_url')?> : </th>
                        <td>
                            <input type="text" name="videos" class="form-control" />
                        </td>
                    </tr>
            </div>

        </div>
       

        <div class="row-fluid" style="margin-top:20px;">
            <tr>
               <th><h3><?php echo display('title')?></h3></th> <td><input type="text" required name="title" class="form-control"/></td>
             </tr>
        </div>

        
         <div class="row">
            <div class="col-lg-12">
            <div class="pageslug pull-right"><a href="#" class=""><?php echo display('page_slug')?></a></div>
                <div id="slug">
                    <tr>
                        <td>
                            <input type="text" placeholder="Page Slug" name="slug" class="form-control"/>
                        </td>
                    </tr>
                </div>
            </div>
        </div>
            
        <div class="row-fluid">
            <fieldset><legend><?php echo display('description')?></legend>
                <table width="100%">
                    <tr>
                        <td>
                            <textarea  name="description" id="details_news" rows="10" cols="80"></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <div class="row" style="margin: 10px;"></div>
        <div class="row-fluid">
            <fieldset>
                <legend> <?php echo display('keyword_and_description_area')?></legend>
                <table width="100%">
                    <tr>
                        <td colspan="2">
                          <?php echo display('keyword')?> : <input name="meta_keyword" id="tags" class="form-control" />
                           <?php echo display('description')?> : <textarea class="form-control" name="meta_description"></textarea>
                           <!-- <?php echo display('related_id')?> : <input name="releted" class="form-control" /> -->
                        </td>
                    </tr>
                    <tr><td style=""></td></tr>
                    <tr>
                        <td align="right">
                            <input type="reset" value="Reset" class="btn btn-danger" />
                            <input type="submit" name="" value="<?php echo display('save')?>" class="btn btn-primary" />
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <?php
        echo form_close();
        ?>
    </section><!-- /.content -->
</aside><!-- /.right-side -->

<script type="text/javascript">
    $(document).ready(function(){
         $('#slug').hide();
        $(".pageslug a").click(function(){
            $('#slug').toggle('show');
        });
    });

</script>



