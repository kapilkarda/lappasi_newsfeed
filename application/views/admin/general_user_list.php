<?php include("view_left_menu.php"); ?>
<aside class="right-side">
    <section class="content">
       

        <fieldset><legend><?php echo display('user_list')?></legend>   
            <table class="table table-bordered table-hover">
                <tr class="t_bg">
                    <th><?php echo display('sl')?></th>
                    <th><?php echo display('picture')?></th>
                    <th><?php echo display('full_name')?></th>
                    <th><?php echo display('email')?></th>
                    <th><?php echo display('address')?></th>
                    <th> <?php echo display('in_time')?></th>
                    <th><?php echo display('action')?></th>
                </tr>

            <?php
                $sl = 1;
                foreach ($query as $row) {
                    $bgcolor = ($sl % 2 == 0) ? 'EEE' : 'CCC';
            ?>
                    <tr>
                        <th><?php echo $sl; ?></th>
                        <th><?php if($row['photo']!=NULL){?>
                            <img src="<?php echo base_url(); ?><?php echo $row['photo'] ?>" width="50">
                            <?php } else{ ?>
                            <img src="<?php echo base_url(); ?>uploads/user/user.png" width="50">
                            <?php }  ?>

                        </th>
                        
                        <td> <?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td> <?php echo $row['address_one']; ?></td>
                        <td>
                            <?php echo 'In:' .  $row['login_time'];  ?>
                        </td>
                        <td>
                           <a href="<?php echo base_url()?>admin/General_user/delete_user/<?php echo $row['id'];?>"><span class="label label-danger" ><i class="fa fa-trash-o"></i><span class="label label-danger" ></a>
                        </td>
                    
                    </tr>
                <?php
                    $sl++;
                    }
                ?>
            </table>
        </fieldset>    
    </section>
</aside>




