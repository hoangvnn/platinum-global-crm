<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>Welcome to Platinum Global</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/master.css" />

<link rel="icon" type="image/png" href="<?php echo site_url();?>iui/iui/iui-favicon.png">
<link rel="apple-touch-icon" href="<?php echo site_url();?>iui/iui/iui-logo-touch-icon.png" />

<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>template/reset.css">
<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>template/global.css">

<script type="text/javascript" src="<?php echo base_url(); ?>template/jquery.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>template/search.js"></script>

<!--[if IE 8]>
<link rel="stylesheet" href="assets/stylesheets/ie8.css" />
<![endif]-->
<!--[if !IE]><!-->
<script src="<?php echo site_url();?>assets/javascripts/iscroll.js"></script>
<!--<![endif]-->
<script src="<?php echo site_url();?>assets/javascripts/jquery.js"></script>
<script src="<?php echo site_url();?>assets/javascripts/master.js"></script>
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
<div id="main" class="abs" style="width: 70%; left:auto; min-width: 70%;">
    <div class="abs header_upper chrome_light">
        <span class="float_left button" id="button_navigation">
            Navigation
        </span>
        <a href="<?php echo site_url().'user/logout'; ?>" class="float_left button">
            Logout
        </a>
         <?php
        if($this->session->userdata['type'] == 1)
        {
        ?>
        <a href="<?php echo site_url(). 'contact/add_contact/'; ?>" class="float_right button">
            Add
        </a>
        <?php
        }
        ?>
        Contact information 
    </div>
    
    
    
    
    <div id="main_content" class="abs">
        <div id="main_content_inner" style="padding: 20px 50px 1px;">
        <?php
            if (is_array($contact))
            {
                if($this->session->userdata['type'] == 1)
        {
        ?>
        <a href="<?php echo site_url(). 'contact/edit_contact/'.$contact['contact_id']; ?>" class="float_right button">
            Edit Contact
        </a>
        <?php
        }
        ?>
        
        <table style="line-height: 15px; width: auto; border: none; " class="data" >
            <tr>
            <td>
                <?php
                    $img_link = site_url().'img/'.$contact['picture'];
                    $url = getimagesize($img_link);
                    if (is_array($url))
                    {
                        $img_link = site_url().'img/'.$contact['picture'];
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
                        <a href="<?php echo site_url().'contact/edit_image/'.$contact['contact_id'] ;?>"><img src="<?php echo $img_link; ?>" style="width: 70px; height: 70px; border-width: thin; border-color: white; border-style: double; " /></a>    
                    <?php
                        
                    }
                ?>
             </td>
             <td style="vertical-align: middle;">
                    <b style="font-size: 25px; ">&nbsp;&nbsp;<?php echo $contact['name'] ;?></b><br>
                    <i style="font-size: 15px;  font-style: normal;">&nbsp;&nbsp;&nbsp;<?php echo str_replace('\n', '<br/>&nbsp;&nbsp;', $contact['company']) ;?></i><br/>
                </td>
                </tr>
                </table>
                
                <br/>
                <br/>
                
                <table style="line-height: 15px; width: auto; border: none; " class="data" >
                <tr>
                <td style="vertical-align: middle; text-align: right; width: 80px;">
                    <i style="font-size: 15px; font-style: normal;  ">title</i>
                </td>
                <td style="vertical-align: middle; text-align: left;">
                    <b style="font-size: 15px; "><?php echo $contact['position'] ;?></b>
                </td>
                </tr>
                
                <?php
                        $mobile_array = explode(',' , $contact['cell_phone']);
                        foreach ($mobile_array as $key=>$value)
                        {  
                    ?>
                
                            <tr>
                            <td style="vertical-align: middle; text-align: right; width: 80px;">
                                <i style="font-size: 15px; font-style: normal;  ">mobile</i>
                            </td>
                            <td style="vertical-align: middle; text-align: left;">
                                <a href="tel://<?php echo $value ;?>" style="font-size: 15px; font-weight: bold; "><?php echo $value ;?></a>
                            </td>
                            </tr>
                <?php
                        }
                ?> 
                <?php
                        $email_array = explode(',' , $contact['email']);
                        foreach ($email_array as $key=>$value)
                        {  
                    ?>
                
                            <tr>
                            <td style="vertical-align: middle; text-align: right; width: 80px;">
                                <i style="font-size: 15px; font-style: normal;  ">email</i>
                            </td>
                            <td style="vertical-align: middle; text-align: left;">
                                <a href="mailto: <?php echo $value ;?>" style="font-size: 15px; "><?php echo $value ;?></b>
                            </td>
                            </tr>
                <?php
                        }
                ?>
                <tr>
                <td style="vertical-align: middle; text-align: right; width: 80px;">
                    <i style="font-size: 15px; font-style: normal;  ">address</i>
                </td>
                <td style="vertical-align: middle; text-align: left;">
                    <a href="maps:q=<?php echo $contact['business_address'] ;?>" style="font-size: 15px; font-weight: bold; "><?php echo $contact['business_address'] ;?></b>
                </td>
                </tr>
                <tr>
                <td style="vertical-align: middle; text-align: right; width: 80px;">
                    <i style="font-size: 15px; font-style: normal;  ">DOB</i>
                </td>
                <td style="vertical-align: middle; text-align: left;">
                    <b style="font-size: 15px; "><?php echo $contact['birthday'] ;?></b>
                </td>
                </tr>
                       
            </table>
            
            <i style="text-align: left;">---------------------------------------------------------------------------------------------------------------------------</i>
            <br/>
            <br/>
            <?php
                        if(isset($personal_info) && is_array($personal_info))
                        {
                            
                    ?>
                        <table style="line-height: 15px; width: auto; border: none; " class="data" > 
                        <div class="row" style="text-align: left;">
                            <?php
                                foreach ($personal_info as $key=>$value)
                                {
                            
                            
                            ?>
                             <td style="vertical-align: middle; text-align: right; width: 80px;">
                             <i style="font-size: 15px; font-style: normal;  "><?php echo str_replace('_', ' ', $value['info_type']); ?></i>
                             </td>
                             <td style="vertical-align: middle; text-align: left;">
                             <b style="font-size: 15px; "><?php echo $value['info_data']; ?></b>
                             </td>
                             </tr>
                            <?php
                                }
                            ?>
                        </div>
                        </table>
                    <?php
                        }
                        else
                        { 
                        ?>
                    <table>
                        <td style="vertical-align: middle; text-align: right; width: auto;">
                             <i style="font-size: 15px; font-style: normal;  ">
                             <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'contact/show_more_personal_info/'.$contact['contact_id'] ;?>"><label style="color: navy; ">Click here for more personal info</label></a>
                             </i>
                             </td>
                    </table>
                        <?php
                        }
                        ?>
            <?php
                        if(isset($company_info) && is_array($company_info))
                        {
                            
                    ?>
                        <table style="line-height: 15px; width: auto; border: none; " class="data" > 
                        <div class="row" style="text-align: left;">
                            <?php
                                foreach ($company_info as $key=>$value)
                                {
                            
                            
                            ?>
                             <td style="vertical-align: middle; text-align: right; width: 80px;">
                             <i style="font-size: 15px; font-style: normal;  "><?php echo str_replace('_', ' ', $value['info_type']); ?></i>
                             </td>
                             <td style="vertical-align: middle; text-align: left;">
                             <b style="font-size: 15px; "><?php echo $value['info_data']; ?></b>
                             </td>
                             </tr>
                            <?php
                                }
                            ?>
                        </div>
                        </table>
                    <?php
                        }
                        else
                        { 
                        ?>
                    <table>
                        <td style="vertical-align: middle; text-align: right; width: auto;">
                             <i style="font-size: 15px; font-style: normal;  ">
                             <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'contact/show_more_company_info/'.$contact['contact_id'] ;?>"><label style="color: navy; ">Click here for more company info</label></a>
                             </i>
                             </td>
                    </table>
                        <?php
                        }
                        ?>            
             <?php
                        if(isset($other_info) && is_array($other_info))
                        {
                            
                    ?>
                        <table style="line-height: 15px; width: auto; border: none; " class="data" > 
                        <div class="row" style="text-align: left;">
                            <?php
                                foreach ($other_info as $key=>$value)
                                {
                            
                            
                            ?>
                             <td style="vertical-align: middle; text-align: right; width: 80px;">
                             <i style="font-size: 15px; font-style: normal;  "><?php echo str_replace('_', ' ', $value['info_type']); ?></i>
                             </td>
                             <td style="vertical-align: middle; text-align: left;">
                             <b style="font-size: 15px; "><?php echo $value['info_data']; ?></b>
                             </td>
                             </tr>
                            <?php
                                }
                            ?>
                        </div>
                        </table>
                    <?php
                        }
                        else
                        { 
                        ?>
                    <table>
                        <td style="vertical-align: middle; text-align: right; width: auto;">
                             <i style="font-size: 15px; font-style: normal;  ">
                             <a style="display: inline; background: none; padding-top: 2px;" href="<?php echo site_url().'contact/show_more_other_info/'.$contact['contact_id'] ;?>"><label style="color: navy; ">Click here for more other info</label></a>
                             </i>
                             </td>
                    </table>
                        <?php
                        }
                        ?>    
            <?php
            }
            
            
            
            ?>
            
            
            </div>
    </div>
    <?php //<div class="abs footer_lower chrome_light">
        //<a href="#" class="float_left button">
//            Foo
//        </a>
//        <a href="#" class="float_left button">
//            Bar
//        </a>
//        <a href="#" class="icon icon_bird float_right"></a>
//        <a href="#">View full site</a>
    //</div> ?>
</div>
<div id="sidebar" class="abs" style="width: 30%;">
    <span id="nav_arrow"></span>
    <div class="abs header_upper chrome_light">
        Contacts
    </div>
   
    <?php
        $split = array();
        foreach ($list as $item) {
            $split[$item['name'][0]][] = $item;
        }
        ksort($split);
     ?>

   
    <?php
     
   
   
    $attributes = array('class' => 'abs header_lower chrome_light');
    echo form_open(site_url() . 'contact/search_contact', $attributes); ?>
    <input type="search" id="q" name="search" placeholder="Search..." />
        <button name="btnSearch" type="submit" class="float_right button">Search</button>
    <?php echo form_close(); ?> 
                                                                 
    <div id="sidebar_content" class="abs">
        <div id="sidebar_content_inner">
        <ul id="sidebar_menu" style="font-size: 15px;">
        <?php
            if(!is_array($list))
            {
            ?>
                <li>
                    <a href="#"><span class="abs"></span><?php echo 'Contact not found'; ?></a>
                </li>    
            <?php
  
            }
            else
            {
                foreach ($split as $char => $list)
                {     
            ?>
                    <li id="sidebar_menu_home" class="active">
                        <a href="#"><span class="abs"></span><?php echo $char; ?></a>
                    
            <?php
                                
                     foreach ($list as $row)
                    {    
            ?>
                    <li>
                     <?php
                        echo '<a href = "'.site_url() . 'contact/user/'.$row['contact_id'].'">'.$row['name'].'<br/>'.'</a>';
                    ?>
                    </li>
                    <?php
                    }
                    ?>
                    
                    </li>
                    <?php
                }
            }
        ?>
        </ul>            
        </div>
    </div>
   <?php // <div class="abs footer_lower chrome_light">
        //<a href="#" class="icon icon_gear2 float_left"></a>
        //<span class="float_right gutter_right">Some descriptive text here</span>
    //</div> ?>
</div>
</body>
</html>
