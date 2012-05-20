<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Platinum Global</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="icon" type="image/png" href="<?php echo site_url();?>iui/iui/iui-favicon.png">
    <link rel="apple-touch-icon" href="<?php echo site_url();?>iui/iui/iui-logo-touch-icon.png" />
    <link rel="stylesheet" href="<?php echo site_url();?>iui/iui/iui.css" type="text/css" />
    <link rel="stylesheet" title="Default" href="<?php echo site_url();?>iui/iui/t/default/default-theme.css"  type="text/css"/>
    <link rel="stylesheet" href="<?php echo site_url();?>iui/css/iui-panel-list.css" type="text/css" />
    <style type="text/css">
        .panel p.normalText { text-align: left;  padding: 0 10px 0 10px; }
    </style>
    <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>

    </head>
<body>
    <div id="search" class="dialog">
    <fieldset>
    <h1>Search</h1>
        <a class="button leftButton" type="cancel">Cancel</a>
        <a class="button blueButton" type="submit">Search</a>
        <label for="keyword">Search:</label>
        <input id="keyword" type="text" name="q">
        </fieldset>
  </div>

    <div class="toolbar">
        <h1 id="pageTitle">Login</h1>
        <a id="backButton" class="button" href="#"></a>
    </div>
    
    <div id="home" class="panel" selected="true"> 
        <fieldset><p class="normalText">Use the form below to login to our site</p> </fieldset>
        <?php echo form_open(site_url() . '/user/login', array('class' => 'panel')); /**<img src="<?php echo base_url()?>/img/image001.jpg" border="1" width="395" />*/ ?>
                <h2>Username:
                    <?php echo form_input(array('id' => 'username', 'name' => 'username', 'size' => 20, 'style' => 'font-size:20px')); ?>
                </h2>     
                
                <h2>
                Password:
                    <?php echo form_password(array('id' => 'password', 'name' => 'password', 'size' => 20, 'style' => 'font-size:20px')); ?>
                </h2>
                
                <h2 style="text-align: center;">
                     <?php
                        if ($this->session->flashdata('login_error'))
                           echo 'Wrong username or password';
                        echo validation_errors(); 
                     ?>
                </h2>
                <br/>
                <center>
                    <button type="submit" class="button" style="height: 30px; width: 100px; top: auto; right: auto; position: relative; ">Login</button> <button type="reset" class="button" style="height: 30px; width: 100px; top: auto; right: auto; position: relative; ">Reset</button>
                    
                </center>
			
		<?php echo form_close(); ?>	
	</div>

</body>
</html>