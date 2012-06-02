<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>Welcome to Platinum Global</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    
    <link rel="icon" type="image/png" href="<?php echo site_url();?>iui/iui/iui-favicon.png">
    <link rel="apple-touch-icon" href="<?php echo site_url();?>iui/iui/iui-logo-touch-icon.png" />
    <link rel="stylesheet" href="<?php echo site_url();?>iui/iui/iui.css" type="text/css" />
    <link rel="stylesheet" title="Default" href="<?php echo site_url();?>iui/iui/t/default/default-theme.css"  type="text/css"/>
    <link rel="stylesheet" href="<?php echo site_url();?>iui/css/iui-panel-list.css" type="text/css" />
    <style type="text/css">
        .panel p.normalText { text-align: left;  padding: 0 10px 0 10px; }
    </style>
     <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
         <script type="application/x-javascript"> 
     
   addEventListener("load", function() 
   { 
   setTimeout(updateLayout, 0); 
   }, false); 
   
   var currentWidth = 0; 
   
   function updateLayout() 
   { 
   if (window.innerWidth != currentWidth) 
   { 
   currentWidth = window.innerWidth; 
   
   var orient = currentWidth == 320 ? "profile" : "landscape"; 
   document.body.setAttribute("orient", orient); 
   setTimeout(function() 
   { 
   window.scrollTo(0, 1); 
   }, 100); 
   } 
   } 
   
   setInterval(updateLayout, 100); 
   
   </script>
</head>
<body> 
        <div class="toolbar">
        <h1 id="pageTitle">Info</h1>
        
        <a id="backButton" style="display: inline" class="button" href="<?php echo site_url(). 'user/logout'; ?>">Log out</a>
        <a id="otherButton" style="display: inline" class="button" href="<?php echo site_url() . '/contact'; ?>">Contact</a>
        
        </div>

        <div class="panel" selected="true" >
            
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; "></label>
                            <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'user/changing_password/';?>"><label style="color: navy; ">Click here for changing your password</label></a>
                        </div>
                    </fieldset>
                    
                    <?php
                    if($this->session->userdata['type'] == 1)
                    {
                    ?>
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; "></label>
                            <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'user/add_new_user/' ;?>"><label style="color: navy; ">Click here for adding new user</label></a>
                        </div>
                    </fieldset>
                    
                    
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; "></label>
                            <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'contact/show_more_other_info/';?>"><label style="color: navy; ">Click here for changing user type</label></a>
                        </div>
                    </fieldset>
                     
                     <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; "></label>
                            <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'contact/show_more_other_info/' ;?>"><label style="color: navy; ">Click here for deleting user</label></a>
                        </div>
                    </fieldset>
                    <?php
                    }
                    ?>  
        </div>
	
</body>
</html>