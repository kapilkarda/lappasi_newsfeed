<script type="text/javascript">
    $(document).ready(function () {
        function test(catID_Avaibale) {
            $('#myModalLabel').html("Archive News");
            $.ajax({
                url: "<?php echo base_url(); ?>admin/Archive/archive_newses_by_category/" + catID_Avaibale,
                context: document.body
            }).done(function (data) {
                //alert(data);
            });
        }
        $('.archive_modal').click(function () {
            $('.a').attr('id', this.id);
        });
        
        $('#start_archive').click(function () {
            $("#processing").html("Processing....");
            var catID_Avaibale = $('.a').attr('id');
            var total_news_by_category = catID_Avaibale.split("~");
            var total_call = Math.ceil(total_news_by_category[1] / 10);
            var timerId = 0;
            var counter = 0;
            timerId = setInterval(function () {
                ++counter;
                test(catID_Avaibale);
                var percentage = Math.round(((10 * counter) * 100) / total_news_by_category[1]);
                if (percentage > 100) {
                    percentage = 100;
                }
                $('.archive_process').css(
                        'width', percentage + '%'
                        );
                $('.archive_process').html(percentage + '%');
                if (counter === total_call) {
                    $("#processing").html("Completed");
                    $(".archive_status").css('display', 'block');
                    $(".a").addClass('disabled');
                    clearInterval(timerId);
                }
            }, 5000);
        });
        $('#myModal').on('hide.bs.modal', function () {
            location.reload();
        });
    });
</script>

<?php
    $this->load->view('admin/view_left_menu.php');
?>

<aside class="right-side">
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo display('close')?></span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo display('archive_news')?></h4>
                </div>
                <div class="modal-body">
                    <span id="processing"></span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped archive_process" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg a" id="start_archive"><?php echo display('start_archive')?></button>
                    <br>
                    <div class="archive_status" style="padding-top: 35px;display: none;">
                        <div class="alert alert-success">
                            <button class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-check fa-2x text-left" style="color: green;"></i>
                            <b>Archived Successfully.</b>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">  
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button class="close" data-dismiss="alert">&times;</button><b>';
            echo $this->session->flashdata('message');
            echo '</b></div>';
        }
        
        ?>


        <?php
            $attribute = array('method'=>'post'); 
            echo form_open('admin/Archive/save_max_archive_settings',$attribute);
        ?>
        <div class="page_heading"><i class="glyphicon glyphicon-cog"></i>&nbsp; <?php echo display('maximum_archive_settings')?><input type="submit" value="<?php echo display('update')?>" class="btn btn-success btn-lg pull-right text-right" name="update"></div>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>#</th>
                    <th width="50%"><?php echo display('category');?></th>
                    <th width="10%"><?php echo display('maximum_news');?></th>
                    <th width="10%"><?php echo display('available_for_archive');?></th>
                    <th width="10%"><?php echo display('action');?></th>
                </tr>
                <?php
                $i = 0;
                if (isset($categories) && is_array($categories)) {
                    foreach ($categories as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $value->category_name; ?></td>
                            <td><input type="number" class="form-control" name="<?php echo $value->category_id; ?>" value="<?php echo ($value->max_archive == '') ? 0 : $value->max_archive; ?>"></td>
                            <td><h4><div class="label label-<?php echo $value->available_for_archive > 0 ? "success" : "warning"; ?>"><?php echo $value->available_for_archive <= 0 ? 0 : $value->available_for_archive; ?></div></h4></td>
                            <td>
                                <button type="button" class="btn btn-primary archive_modal <?php echo $value->available_for_archive <= 0 ? "disabled" : ""; ?>" id="<?php echo $value->category_id . '~' . $value->available_for_archive; ?>" data-toggle="modal" data-target="#myModal">
                                    <?php echo display('archive');?>
                                </button>
                            </td>

                        </tr>
                        <?php
                    }
                }
                ?>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="4" class="text-right"><input type="submit" value="<?php echo display('update');?>" class="btn btn-success btn-lg" name="update"></td>
                </tr>
            </table>
        <?php echo form_close();?>
    </section>
</aside>