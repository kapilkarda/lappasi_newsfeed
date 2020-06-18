
<?php
    $contact_page = json_decode('[' . $contact_page_setup . ']');
?>

        <section class="block-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Subscription</h1>
                        <div class="breadcrumbs">
                            <ul>
                                <li><i class="pe-7s-home"></i> <a href="<?php echo base_url();?>" title=""><?php echo display('home')?></a></li>
                                <li><a href="<?php echo base_url()?>Subscription/index" title="">Subscription</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php if(!empty(validation_errors())){?>
                       <div class="alert alert-danger ">
                            <a href="" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong><?php  echo validation_errors(); ?></strong>
                       </div>
                    <?php } ?>  

                    <?php 
                        $msg = $this->session->flashdata('msg');
                         if(!empty($msg)){
                            echo $msg;
                        }
                    ?>

                    <?php 
                        if($this->session->flashdata('message')){
                            echo '<div class="alert alert-success ">
                           <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>'.$this->session->flashdata('message').'</strong>
                           </div>';
                        }
                        if($this->session->flashdata('exception')){
                            echo '<div class="alert alert-danger ">
                           <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>'.$this->session->flashdata('exception').'</strong>
                           </div>';
                        }

                    $recaptcha = $this->db->select('*')->from('social_auth')->where('id',3)->where('status',1)->get()->row();    
                    ?>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="subscription_inner">
                        <?php echo form_open('Subscription/save')?>
                            <div class="form-group">
                                <div class="form-label">Name <sup>*</sup></div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Username or Emaile">
                            </div>
                            <div class="form-group">
                                <div class="form-label">Email <sup>*</sup></div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <div class="form-label">Phone <sup>*</sup></div>
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number">
                            </div>

                            <div class="form-group">
                             <?php
                                    foreach ($cata as $value) {
                                ?>  
                                <label class="checkbox-inline">
                                    <input type="checkbox"  name="category[]" value="<?php echo $value->slug;?>" value=""><?php echo $value->category_name;?>
                                </label>
                                <?php         
                                    }
                                ?>
                            </div>

                            <div class="form-group">
                                <div class="form-label">Frequency <sup>*</sup></div>
                                <select name="frequency" class="form-control">
                                  <option value="1">Daily</option>
                                  <option value="7">Weekly</option>
                                  <option value="30">Monthly</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="form-label">Number Of News <sup>*</sup></div>
                                <input type="number" class="form-control" name="news_number" placeholder="How many News" >
                            </div>
                            
                            <?php if(@$recaptcha!=NULL){?>
                             <div class="form-group">
                                <div id="RecaptchaField3"></div>
                            </div>
                            <?php }?>



                            <button type="submit" class="btn btn-style">Submit</button>

                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom: 40px;"></div>






<script type="text/javascript">
    var CaptchaCallback = function() {
        grecaptcha.render('RecaptchaField3', {'sitekey' : '<?php echo @$recaptcha->app_secret;?>'});
    };
</script> 