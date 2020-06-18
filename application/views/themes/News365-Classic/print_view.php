<?php
    $bu = base_url();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="<?php echo base_url().@$website_favicon;?>" type="image/x-icon" />
<META NAME="copyright" CONTENT="">
<title><?php echo @$website_title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/print.css">
    <script type="text/javascript">
        function nprint(){
            document.getElementById("print").innerHTML='';
            window.print();
        }
    </script>

</head>
		
<body>

    <div id="print">
    	<a href="#" onclick="nprint()" title="Click to Print"><img src="<?php echo $bu;?>assets/icon/print.jpg" height="30" width="30" align="" /></a>
    </div>
    
    <div class="printpage">	
        <div class="header"><img src="<?php echo $bu.@$website_logo;?>" height="75" alt="<?php echo @$website_title;?>"  title="<?php echo @$website_title;?>" /></div>
        <div class="title"><?php  echo $stitle.' '.$title; ?></div>
        <div class="post-time"><?php  echo date("l, d M Y H:i a",$time_stamp); ?></div>
        
    	<div class="news">
    		<?php  
    		if($image){echo '<img src="'.$bu.'/uploads/'.$image.'" align="left" width="400" title="'.@$website_title.'" alt="'.@$website_title.'" />';}
    		?>
            <h1><?php echo @$website_title;?></h1>
    		<?php echo $news; ?>
    	</div>
        
    	<div class="footer">
            <div class="fc_left">
                <a href="<?php echo $bu;?>"><img src="<?php echo $bu.@$website_logo; ?>" height="35" title="<?php echo @$website_title;?>" alt="<?php echo @$website_title;?>" /></a>
                <p>Copyright &copy; <?php echo @$website_title; ?>.com</p>		
            </div>
            <div class="fc_center">
            <?php
                echo @$website_footer['website_footer'];
            ?>
            <?php
                echo @$website_footer['copy_right'];
            ?>
            </div>
        </div>

    </div>

</body>
</html>
