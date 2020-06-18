<script type="text/javascript">
    $(document).ready(function () {
        $('#delete_cache').click(function () {
            $("#processing").html("Processing....");
            $.ajax({
                url: "<?php echo base_url();?>admin/Cache_controller/delete_cache",
                context: document.body
            }).done(function (data) {
                //alert(data);
            });
            var total_news_by_category = 10;
            var total_call = Math.ceil(total_news_by_category/ 10);
            var timerId = 0;
            var counter = 0;
            timerId = setInterval(function () {
                ++counter;
                var percentage = Math.round(((10 * counter) * 100) / 10);
                if (percentage > 100) {
                    percentage = 100;
                }
                $('.archive_process').css(
                        'width', percentage + '%'
                        );
                $('.archive_process').html(percentage + '%');
                if (counter === total_call) {
                    $("#processing").html("Completed");
                    $(".cache_status").css('display', 'block');
                    $(".a").addClass('disabled');
                    clearInterval(timerId);
                }
            }, 4000);
        });
        $('#myModal').on('hide.bs.modal', function () {
            location.reload();
        });
    });
</script>

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
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo display('close')?></span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo display('delete_cache_file')?></h4>
                </div>
                <div class="modal-body">
                    <span id="processing"></span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped archive_process" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                    <br>
                    <div class="cache_status" style="padding-top: 35px;display: none;">
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-check fa-2x text-left" style="color: green;"></i>
                            <b><?php echo display('delete_message')?></b>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-lg a pull-left" id="delete_cache"><?php echo display('yes')?></button>
                    <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal"><?php echo display('close')?></button>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <h4><i class="fa fa-upload"></i> <?php echo display('cache_setting')?></h4>
        <hr/>
        <?php
        if ($this->session->flashdata('message')) {
            ?>
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert">&times;</button>
                <?php
                echo "<b>" . $this->session->flashdata('message') . "</b>";
                ?>
            </div>
            <?php
        }
        ?>
       
<!--<div class="form-group">-->
             
                <div class="row">
                    <div class="col-md-3"> 
                        <button type="button" class="btn btn-warning btn-lg cache_modal" id="" data-toggle="modal" data-target="#myModal">
                               <?php echo display('delete_cache_file')?>
                        </button>
                    </div>
                    
                     <div class="col-md-3">   
                        <?php if($d->status==0){ ?>
                        <a href="<?php echo base_url();?>admin/Cache_controller/ceche_on" class="btn btn-lg btn-success"><?php echo display('cache_on')?></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url();?>admin/Cache_controller/ceche_off" class="btn btn-lg btn-danger"><?php echo display('cache_off')?></a>
                        <?php } ?>
                     </div>  
                     <div class="col-md-3">
                        <p><strong>Cache Path</strong> : <?php echo $d->cache_path;?></p>
                     </div>
                      
                    </div>
                </div>


    </section>
</aside>