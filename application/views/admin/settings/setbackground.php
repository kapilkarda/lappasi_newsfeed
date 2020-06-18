


<script type="text/javascript">
    function loadcss() {
        var p = document.getElementById("select_type").value;

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = ActiveXObject('Microsoft.XMLHTTP');
        }

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('css_code').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open('Get', '<?php echo base_url(); ?>view_setup/get_style/' + p, true);
        xmlhttp.send();

    }




    $(document).ready(function () {
        $('.stylet').css({'display': 'none'});


        $('#select_type').on('change', function () {
            var select_type = $('#select_type option:selected').val();
            if (select_type !== '') {

                $('.stylet').css({'display': 'block'});
            }
        });
    });




    $(document).ready(function () {
        $('.img_ad').css({'display': 'none'});
        $('.embed_code_ad').css({'display': 'none'});
        $('.img_style').css({'display': 'none'});

        $('#b_type').on('change', function () {
            var b_type = $('#b_type option:selected').val();
            if (b_type == 1) {
                $('.img_ad').css({'display': 'none'});
                $('.img_style').css({'display': 'none'});
                $('.embed_code_ad').css({'display': 'block'});
            }
            else if (b_type == 2) {
                $('.img_ad').css({'display': 'block'});
                $('.embed_code_ad').css({'display': 'none'});
                $('.img_style').css({'display': 'block'});
            }
            else {
                $('.img_ad').css({'display': 'none'});
                $('.embed_code_ad').css({'display': 'none'});
                $('.img_style').css({'display': 'none'});
            }

        });
    });
</script>



<?php $this->load->view('admin/view_left_menu'); ?>
<aside class="right-side">
    <section class="content">
        <h3>Submit Background</h3>
        <hr/>
        <div class="row-fluid">
            <div class="col-sm-5 col-sm-offset-3">
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

                if ($this->session->flashdata('exception')) {
                    ?>
                    <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert">&times;</button>
                        <?php
                        echo $this->session->flashdata('exception');
                        ?>
                    </div>
                    <?php
                }
                ?>

                <!-- for main background -->
                <form action="<?php echo base_url(); ?>admin/view_setup/SaveSetBackground" class="form-horizontal" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Select content</label>
                        <select name="select_type" class="form-control" id="select_type" required="1" onchange="loadcss(this.value)">
                            <option value="">---Select content--</option>
                            <option value="1">Body</option>
                            <option value="2">Content</option>
                            <option value="3">Header</option>
                            <option value="4">Footer</option>  
                        </select>
                    </div>
                    <div class="css_code" id="css_code">

                    </div> 

                    <div class="form-group stylet ">
                        <label>Select type</label>
                        <select name="b_type" class="form-control" id="b_type" required="1" onchange="set_ad_type(this.value)">
                            <option value="">--Select--</option>
                            <option value="1">Css Code</option>
                            <option value="2">Background Image </option>
                        </select>
                    </div>

                    <div class="img_ad">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="b_image" class="form-control">
                        </div>   
                    </div>
                    <div class="img_style">
                        <div class="form-group">
                            <input type="checkbox" value="1" name="no_repeat" id="no_repeat"/> No_repeat  &nbsp;
                            <input type="checkbox" value="2" name="fixed" id="fixed"/> Fixed  &nbsp;
                            <input type="checkbox" value="3" name="repeat" id="repeat"/> Repeat  &nbsp;
                            <!-- <input type="checkbox" value="4" name="repeat_y" id="repeat_y"/> Repeat Y  &nbsp; -->
                        </div>   
                    </div>




                    <div class="embed_code_ad">
                        <div class="form-group">
                            <label>Css Code</label>
                            <textarea name="css_code" id="css_code"class="form-control">
                           
                            </textarea>
                        </div> 
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary">

                    </div>
                </form>

                <hr>



            </div>
        </div>
    </section>
</aside>
</div>
</div>