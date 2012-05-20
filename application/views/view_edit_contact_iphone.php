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
        <div class="toolbar">
        <h1 id="pageTitle">Info</h1>
        <a id="backButton" style="display: inline" class="button" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>
        <a id="otherButton" style="display: inline; width: 50px; text-align: center;" class="button" href="<?php echo site_url(). 'contact/edit_contact/'.$contact->contact_id; ?>"> Edit </a>
        </div>

        <div class="panel" selected="true" style="line-height: 25px;">
            
            <table>
                <td valign="top" class="panel">
                    <?php
                        $img_link = site_url().'img/'.$contact->picture;
                        if (@fopen($img_link, 'r'))
                        {
                            $img_link = site_url().'img/'.$contact->picture;
                        }
                        else
                        {
                             $img_link = site_url().'img/not_available.png';
                        }
                    ?>
                    
                    <a href="<?php echo site_url().'contact/edit_image/'.$contact->contact_id ;?>"><img src="<?php echo $img_link; ?>" style="width: 100px; height: 150px; " /></a>    
                </td>
                <td class="panel" valign="top">
                    <b><?php echo $contact->name ;?></b><br/>
                    <b><u style="color: gray;"><?php echo $contact->position ;?></u></b><br/>
                    <b><?php echo str_replace('\n', '<br/>', $contact->company) ;?></b><br/>          
                    <b><u>Cellphone:</u> <?php echo str_replace('\n', '<br/>', $contact->cell_phone);?></b><br/>       
                    <b><u>Email:</u> <?php $message = wordwrap($contact->email, 21, "<br/>", true); echo $message; ?></b><br/>
                    <?php  
                     /**<b><u>DOB:</u> <?php        
                     echo date('M d, Y', strtotime($contact->birthday)) ;?></b>
                    <br/>*/
                    ?>
        
                </td>
            </table>
            
             
        </div>
	
</body>
</html>