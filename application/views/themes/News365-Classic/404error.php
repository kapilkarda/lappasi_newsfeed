
<style type="text/css">
    
.wrap{
    margin:0 auto; 
    width: 96%;
    background: url('../images/bg.png');
}
.page h2{
    color: #f60d2b;
    font-size: 2em;
    text-transform: uppercase;
    font-weight: bold;
}
.banner{
    text-align:center;
    margin-top: 30px;
}
.banner img{
    margin-top: 0px;
}
.page{
    text-align:center;
    font-family: "Century Gothic";
    padding-bottom: 10px;
}


@media all and (max-width:640px) and (min-width:480px){
.wrap{
    width: 90%;
}
h1{
    font-size: 1.6em;
}
.banner{
    margin-top: 0px;
}
.banner img{
    width: 32%;
}
.page h2{
    font-size:1.6em;
}
}
@media all and (max-width:480px) and (min-width:320px){
.wrap{
    width: 90%;
}
h1{
    font-size: 1.4em;
}
.banner{
    margin-top: 0px;
}
.banner img{
    width: 32%;
}
.page h2{
    font-size:1.4em;
}

}
@media all and (max-width:320px){
.wrap{
    width: 90%;
}
h1{
    font-size: 1.4em;
}
.banner{
    
}
.banner img{
    width:80%;
}


}
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
           <div class="wrap">
    
    <div class="banner">
        <img src="<?php echo base_url(); ?>application/views/themes/<?php echo $default_theme;?>/web-assets/images/404-error.jpg" alt="" />
    </div>
    <div class="page">
        <h2>Sorry, Error occured!,  Page not Found.</h2>
    </div>
    
</div>
        </div>
    </div>
</div>

     