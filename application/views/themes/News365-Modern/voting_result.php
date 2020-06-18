
<div class="container">
    <div class="vot-wrapper">
    <?php
     $voting_result = $this->db->select("*")
            ->from('pulling')
            ->where('status',1)
            ->order_by('id','DESC')
            ->get()->result();

        echo"<p class='result_header'>Pulling Result</p>";
    
    foreach (@$voting_result as $key => $value) {
        @$total = $value->yes + $value->no + $value->on_comment;
        @$yes = ($value->yes/$total)*100;
        @$no = ($value->no/$total)*100;
        @$on_comment = ($value->on_comment/$total)*100;
       
    ?>

        <div class="pulls">
            <div class="v_title"><span><?php echo display('date')?>: </span> <?php echo date('l, d M Y',$value->time_stamp); ?></div>
            <div class="v_title"><span><?php echo display('question')?> : </span><?php echo $value->question; ?></div>
            <div class="v_title"><span>Voted : </span><?php echo $total; ?> Person</div>
            
            <div>
                <span style='color:#148931;'><?php echo display('yes')?></span> Voted (<?php echo $value->yes; ?>) person,
                <span style='color:#F10E0A;'><?php echo display('no')?></span> Voted (<?php echo $value->no; ?>) Person,
                <span style='color:#F10E0A;'><?php echo display('no_comment')?></span> (<?php echo $value->on_comment; ?>) Person
            </div>
         

            <div class='yv' style='width:<?php echo intval($yes); ?>%;'><?php echo intval($yes); ?> % <span><?php echo display('yes')?></span></div>
            <div class='nv' style='width:<?php echo intval($no); ?>%;'><?php echo intval($no); ?> % <span><?php echo display('no')?></span></div>
            <div class='ncv' style='width: <?php echo intval($on_comment); ?>%;'><?php echo intval($on_comment); ?> % <span><?php echo display('no_comment')?></span></div>
        </div>

        <?php } ?>
    </div>
</div>
</div>


