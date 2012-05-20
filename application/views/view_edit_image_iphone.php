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
            
            <?php echo form_open_multipart('upload/do_upload/'.$contact->contact_id);?>

            <input type="file" name="userfile" size="20" />

            <br /><br />

            <button type="submit" value="upload" class="button" style="height: 30px; width: 100px; top: auto; right: auto; position: relative; ">Upload</button>
            </form>            
             
        </div>
	
</body>
</html>