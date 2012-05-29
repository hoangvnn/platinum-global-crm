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
        <h1 id="pageTitle">Contacts</h1>
        <?php
            if (!isset($_POST['search']) || $_POST['search'] == '')
            {       
        ?> 
        
            <a id="backButton" style="display: inline" class="button" href="<?php echo site_url(). 'user/logout'; ?>"> Logout</a>
        
        <?php
            }
            else
            {
            $_POST['search'] = ''; 
        ?>
            <a id="backButton" style="display: inline" class="button" href="<?php echo site_url(). 'contact'; ?>"> Contacts</a>
         <?php
            }
        if($this->session->userdata['type'] == 1)
        {
        ?>
            <a id="otherButton" style="display: inline; width: 50px; text-align: center;" class="button" href="<?php echo site_url(). 'contact/add_contact/'; ?>"> Add   </a>
        <?php
        }
        ?>
        
        </div>

        <?php
            $split = array();
            foreach ($list as $item) {
                $split[$item->name[0]][] = $item;
            }
            ksort($split);
         ?>
        
           
        
        
        <ul id="contacts" title="Contacts" selected = "true"  >
                        <?php echo form_open(site_url() . 'contact/search_contact'); ?>
                        <div class="row" style="text-align: left; border: thin; " >
                            <label style="color: gray ">Search  </label>
                            <i style="padding-right: 1em;"></i>
                            <?php echo form_input(array('id' => 'search', 'name' => 'search', 'style' => 'width: auto; padding-left: 0px;  ')); ?>
                            <button type="submit" id="otherButton" style="display: inline; width: 60px; text-align: center; font-size: 12px;  font-weight: bold; color: white; padding: 0px 0px 0px 0px;" class="button"> Search </a>
                        </div>
                        <?php echo form_close(); ?>
            <?php
                if(!is_array($list))
                {
                ?>
                    <li class="group" style="text-align: center"><?php echo 'Contact not found'; ?></li>    
                <?php
      
                }
               
                foreach ($split as $char => $list)
                {     
            ?>
                <li class="group"><?php echo $char; ?></li>
            <?php
                                
                foreach ($list as $row)
                { 
            ?>
            <li style="background: white;">
            <?php
                    echo '<a href = "'.site_url() . 'contact/user/'.$row->contact_id.'">'.$row->name.'<br/>'.'</a>';
            ?>
            </li>
            <?php
                }
                }
            ?>
        </ul>
                
        </div> 
</body>
</html>