<section class="login-reg-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
               <div class="alert alert-success ">
                   <a href="" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> 
                   <p> <?php echo display('name')?> : <?php echo $name;?></p>
                   <p> <?php echo display('email')?> : <?php echo $email;?></p>
                   <p> <?php echo display('password')?> : <?php echo $password;?></p>
               </div>
                    <a href="<?php echo base_url();?>Registration/redirect" class="btn btn-primary"> <?php echo display('click_to_dashbord')?></a>
            </div>
        </div>
    </div>
</section>