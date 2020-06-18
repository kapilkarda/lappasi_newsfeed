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
        <div class="row">
            <?php 
                $form_attribute = array('method' =>'post','class'=>'form-inline');
                echo form_open('admin/News_list/user_interface',$form_attribute);
            ?>
                    <table class="table search">
                        <tr>
                            <td style="text-align: right;"><?php echo display('form_date')?> : </td>
                            <td>
                                <input type="text" name="formdate" value="<?php echo date("d-m-Y") ?>"  class=" datepicker form-control input-sm " />
                            </td>
                            <td style="text-align: right;"><?php echo display('to_date')?> : </td>
                            <td>
                                <input type="text" name="todate" value="<?php echo date("d-m-Y") ?>" class="form-control input-sm datepicker" />
                            </td>
                            <td>
                                <input type="submit" value="<?php echo display('scearch')?>" name="ok" class="btn btn-default"/>
                            </td>
                        </tr>
                    </table>
            <?php echo form_close();?>
        </div>

        <div class="row">
        <?php 

        date_default_timezone_set("$time_zone->website_timezone");
            $form_attribute = array('method' =>'post','class'=>'form-inline');
            echo form_open('admin/News_list/user_interface',$form_attribute);
        ?>
            
                <table class="table search">
                    <tr>
                        <td>Category wise : </td>
                        <td>
                            <select name="page_name" id="page_name" onchange="submit()" class="form-control">
                                <option value=" ">-select-</option>
                                <?php foreach ($cat as  $page){?>
                                    <option value="<?php echo $page->slug; ?>" <?php
                                    if ($page->slug == @$_POST['page_name']) {
                                        echo'selected';
                                    }
                                    ?>><?php echo $page->category_name; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td> 
                    
                        <td style="text-align: right;"><?php echo display('news_id');?> : </td>
                        <td>
                            <input type="text" name="news_id" class="form-control"/>
                        </td>
                        <td><input type="submit" value="Search" class="btn btn-default"/></td>
                    </tr>
                </table>
           <?php echo form_close();?>
        </div>



        <div class="row">
            <table class="table table-bordered">
                <tr class="t_bg">
                    <th width="30">Sl</th>
                    <th width="20"><span id="buttons"><input type="checkbox" onclick="Select('true');" /></span></th>
                    <th><?php echo display('title')?></th>
                    <th width="120"><?php echo display('category')?></th>
                    <th width="50"><?php echo display('hit')?></th>
                    <th width="70"><?php echo display('post_by')?></th>
                    <th width="75"><?php echo display('update_by')?></th>
                    <th width="65"><?php echo display('publish_date');?></th>
                    <th width="65"><?php echo display('last_update')?></th>
                    <th width="65"><?php echo display('status')?></th>
                    <th colspan="2"><?php echo display('action')?></th>
                </tr>


                <?php
                    $sl = 1;
                    foreach ($pp as $row) {
                    $bgcolor = ($sl % 2 == 0) ? 'EEE' : 'CCC';                    
                ?>
                    <tr  id="tr_<?php echo $sl; ?>" onclick="change_color('<?php echo $sl; ?>', '#<?php echo $bgcolor; ?>');">
                        <th><?php echo $sl; ?></th>
                        <th><input type="checkbox" name="news_id[]" value="<?php echo $row['news_id']; ?>" /></th>
                        <td><?php echo '<span class="stitle">' . $row['post_date'] . '</span> ' . $row['title']; ?></td>
                        <td><?php echo ucwords($row['page']); ?></td>
                        <td align="center"><?php echo @$row['reader_hit']; ?></td>
                        <?php
                            $result2 = $this->db->select('name')->from('user_info')->where('id', $row['update_by'])->get()->row();
                        ?>
                        <td align="center"><?php echo @$row['name']; ?></td>
                        <td align="center"><?php echo @$result2->name; ?></td>
                        <td align="center" class="smallfont"><?php echo $row['publish_date']; ?></td>
                        <td align="center" class="smallfont"><?php echo @$row['last_update']; ?></td>
                        <th width="40"><a href="<?php echo base_url(); ?>admin/News_edit/user_news_edit/<?php echo $row['news_id']; ?>"><i class="fa fa-edit fa-2x"></i></a></th>
                        <th width="50"><a onclick="delete_cnf('<?php echo base_url(); ?>admin/Delete/singal/<?php echo $row['news_id']; ?>')" href="#"><i class="fa fa-trash-o fa-2x"></i></a></th>
                    </tr>
                    <?php
                    $sl++;
                }
                ?>
            </table>
        </div>
    </section>
</aside>
<div class="pb_right_contain">
</div>
</div>