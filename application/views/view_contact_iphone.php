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
        <a id="backButton" style="display: inline" class="button" href="<?php echo site_url(). 'contact'; ?>">Back</a>
        <?php
    
        if($this->session->userdata['type'] == 1)
        {
        ?>
            <a id="otherButton" style="display: inline; width: 50px; text-align: center;" class="button" href="<?php echo site_url(). 'contact/edit_contact/'.$contact->contact_id; ?>"> Edit </a>
        <?php
        }
        ?>
        
        
        </div>

        <div class="panel" selected="true" >
            
         
            
            
            <table style="line-height: 15px;">
                <td class="panel">
                    <?php
                        $img_link = site_url().'img/'.$contact->picture;
                        $url = getimagesize($img_link);
                        if (is_array($url))
                        {
                            $img_link = site_url().'img/'.$contact->picture;
                        }
                        else
                        {
                             $img_link = site_url().'img/not_available.png';
                        }
                        if($this->session->userdata['type'] != 1)
                        {
                            
                        ?>
                            <img src="<?php echo $img_link; ?>" style="width: 70px; height: 70px; border-width: thin; border-color: white; border-style: double; " />   
                        <?php
                        }
                        else
                        {
                        ?>
                            <a href="<?php echo site_url().'contact/edit_image/'.$contact->contact_id ;?>"><img src="<?php echo $img_link; ?>" style="width: 70px; height: 70px; border-width: thin; border-color: white; border-style: double; " /></a>    
                        <?php
                            
                        }
                    ?>
                    
                     
                    
                        
                </td>
                <td class="panel" valign="middle">
                    <b style="font-size: 20px; ">&nbsp;&nbsp;<?php echo $contact->name ;?></b><br>
                    <i style="font-size: 12px;  font-style: normal;">&nbsp;&nbsp;&nbsp;<?php echo str_replace('\n', '<br/>&nbsp;&nbsp;', $contact->company) ;?></i><br/>
                </td>
                </table>
                    <br/>
                    
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; ">title  </label>
                            <i style="padding-right: 1em;"></i><a style="display: inline; background: none;" href="mailto:<?php echo $contact->position ;?>"><?php echo $contact->position ;?></a>
                        </div>
                    </fieldset>
                    
                    <?php
                        $mobile_array = explode(',' , $contact->cell_phone);
                        foreach ($mobile_array as $key=>$value)
                        {  
                    ?>
                    
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; ">mobile</label>
                            <i style="padding-right: 1em;"></i><a style="display: inline; background: none;" href="tel:<?php echo $value ;?>"><?php echo $value ;?></a>
                        </div>
                    </fieldset>
                   
                    <?php
                    }
                    ?>
                     
                   <?php
                        $email_array = explode(',' , $contact->email);
                        foreach ($email_array as $key=>$value)
                        {
                            
                        
                    ?>
                    
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; ">email</label>
                            <i style="padding-right: 1em;"></i><a style="display: inline; background: none;" href="mailto:<?php echo $value ;?>"><?php echo substr($value, 0, 15).'...' ;?></a>
                        </div>
                    </fieldset>
                    <?php
                    }
                   
                    ?>
                    
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; ">address</label>
                            <i style="padding-right: 1em;"></i><a style="display: inline; background: none;" href="maps:q=<?php echo $contact->business_address ;?>"><?php echo $contact->business_address ;?></a>
                        </div>
                    </fieldset>
                    <?php
                        if(isset($personal_info) && is_array($personal_info))
                        {
                    ?>
                        <fieldset>
                        <div class="row" style="text-align: left;">
                            <?php
                                foreach ($personal_info as $key=>$value)
                                {
                            ?>
                            <label style="color: navy; "><?php echo str_replace('_', '&nbsp;', $value->info_type);?></label>
                            <a style="display: inline; background: none; padding-top: 2px;" ><?php echo $value->info_data;?></a>
                            <br/>
                            <?php
                                }
                            ?>
                        </div>
                        </fieldset>
                    <?php
                        }
                        else
                        { 
                        ?>
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; "></label>
                            <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'contact/show_more_personal_info/'.$contact->contact_id ;?>"><label style="color: navy; ">Click here for more personal info</label></a>
                        </div>
                    </fieldset>
                        <?php
                        }
                        ?>
                    
                    <?php
                        if(isset($company_info) && is_array($company_info))
                        {
                    ?>
                        <fieldset>
                        <div class="row" style="text-align: left;">
                            <?php
                                foreach ($company_info as $key=>$value)
                                {
                            ?>
                            <label style="color: navy; "><?php echo str_replace('_', '&nbsp;', $value->info_type);?></label>
                            <a style="display: inline; background: none; padding-top: 2px;" ><?php echo $value->info_data;?></a>
                            <br/>
                            <?php
                                }
                            ?>
                        </div>
                        </fieldset>
                    <?php
                        }
                        else
                        { 
                        ?>
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; "></label>
                            <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'contact/show_more_company_info/'.$contact->contact_id ;?>"><label style="color: navy; ">Click here for more company info</label></a>
                        </div>
                    </fieldset>
                        <?php
                        }
                        ?>
                    
                    <?php
                        if(isset($other_info) && is_array($other_info))
                        {
                    ?>
                        <fieldset>
                        <div class="row" style="text-align: left;">
                            <?php
                                foreach ($other_info as $key=>$value)
                                {
                            ?>
                            <label style="color: navy; "><?php echo str_replace('_', '&nbsp;', $value->info_type);?></label>
                            <a style="display: inline; background: none; padding-top: 2px;" ><?php echo $value->info_data;?></a>
                            <br/>
                            <?php
                                }
                            ?>
                        </div>
                        </fieldset>
                    <?php
                        }
                        else
                        { 
                        ?>
                    <fieldset>
                        <div class="row" style="text-align: left;">
                            <label style="color: navy; "></label>
                            <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'contact/show_more_other_info/'.$contact->contact_id ;?>"><label style="color: navy; ">Click here for more other info</label></a>
                        </div>
                    </fieldset>
                        <?php
                        }
                        ?>
                    
                             
                    <?php  
                     /**<b><u>DOB:</u> <?php        
                     echo date('M d, Y', strtotime($contact->birthday)) ;?></b>
                    <br/>*/
                    ?>
                    
            
                     
        </div>
	
</body>
</html>