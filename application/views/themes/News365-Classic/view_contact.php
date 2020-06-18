<?php
    $contact_page = json_decode('[' . $contact_page_setup . ']');
?>

    <section class="block-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1><?php echo display('contact')?></h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li><i class="pe-7s-home"></i> <a href="<?php echo base_url();?>" title=""><?php echo display('home')?></a></li>
                            <li><a href="#" title=""><?php echo display('contact')?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12">
                    <?php if(!empty(validation_errors())){?>
                       <div class="alert alert-danger ">
                       <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong><?php  echo validation_errors(); ?></strong>
                       </div>
                        <?php } ?>  
                            <?php 
                             $msg = $this->session->flashdata('msg');
                             if(!empty($msg)){
                                echo $msg;
                             }
                        ?>
                    </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="contact-title">
                    <h2><?php echo display('get_in_touch')?></h2>
                 <p><?php if (isset($contact_page[0]->content)) echo @$contact_page[0]->content; ?></p>
                 </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="contact-address">
                    <!-- Address -->
                    <h3><?php echo display('address')?></h3>
                    <i class="pe-7s-map-2 top-icon"></i>
                    <ul>
                        <li><?php if (isset($contact_page[0]->website)) echo @$contact_page[0]->address; ?> </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-address">
                    <!-- Phone -->
                    <h3><?php echo display('phone')?></h3>
                    <i class="pe-7s-headphones top-icon"></i>
                    <ul>
                        <li><i class="fa fa-mobile"></i> <?php if (isset($contact_page[0]->phone)) echo @$contact_page[0]->phone; ?></li>
                        <li><i class="fa fa-mobile"></i> <?php if (isset($contact_page[0]->phone_two)) echo @$contact_page[0]->phone_two; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-address">
                    <!-- Email -->
                    <h3><?php echo display('email')?></h3>
                    <i class="pe-7s-global top-icon"></i>
                    <ul>
                        <li><i class="fa fa-envelope-o"></i> <?php if (isset($contact_page[0]->email)) echo @$contact_page[0]->email; ?></li>
                        <li><i class="fa fa-globe"></i> <?php if (isset($contact_page[0]->website)) echo @$contact_page[0]->website; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form-area">
                    <?php 
                            $attributes = array('method'=>'post');
                            echo form_open('contacts',$attributes);
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="input">
                                        <input class="input_field" type="text" required="1" name="first_name" id="input-1">
                                        <label class="input_label" for="input-1">
                                            <span class="input_label_content" id="f_name" data-content="<?php echo display('first_name')?>"><?php echo display('first_name')?></span>
                                        </label>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="input">
                                        <input class="input_field" name="last_name" required="1" type="text" id="input-2">
                                        <label class="input_label" for="input-2">
                                            <span class="input_label_content" id="l_name" data-content="<?php echo display('last_name')?>"><?php echo display('last_name')?></span>
                                        </label>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="input">
                                        <input class="input_field" name="email" required="1" type="text" id="input-3">
                                        <label class="input_label" for="input-3">
                                            <span class="input_label_content" id="emai" data-content="<?php echo display('email')?>"><?php echo display('email')?></span>
                                    </label>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="input">
                                        <input class="input_field" name="subject" required="1" type="text" id="input-4">
                                        <label class="input_label" for="input-4">
                                            <span class="input_label_content" id="subject" data-content="<?php echo display('subject')?>"><?php echo display('subject')?></span>
                                </label>
                                </span>
                            </div>
                            <div class="col-sm-12">
                                <span class="input">
                                        <textarea class="input_field" name="message" required="1" id="message"></textarea>
                                        <label class="input_label" for="message">
                                            <span class="input_label_content" data-content="<?php echo display('message')?>"><?php echo display('message')?></span>
                                </label>
                                </span>
                                <button type="submit" class="btn btn-style"><?php echo display('submit')?></button>
                            </div>
                        </div>
                     <?php echo form_close(); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="map">
                     <?php if (isset($contact_page[0]->googlemap)) echo @$contact_page[0]->googlemap; ?>
                </div>
            </div>
        </div>
    </div>

