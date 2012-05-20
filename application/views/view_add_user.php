<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Platinum Global</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 30px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	
	ul{
		list-style: none;
	}
	
	ul li{
		margin-top: 10px;
	}
	
	div#login_form{
		width: 400px;
		margin: 0px auto;
		border: 10px outset #acacac;
		padding: 10px;
        text-align: center;
	}
    
    select {height: 12; width: 100; max-height: 12}
	
	</style>
</head>
<body>
    
	<div id="login_form"> 
        <?php echo form_open(site_url() . 'user/add_new_user'); /**<img src="<?php echo base_url()?>/img/image001.jpg" border="1" width="395" />*/ ?>
        
        <h1>Platinum Global CRM</h1>
		<center><p> Use the form below to register new user</p></center>
        <ul>
            <li>
                <label>Username:</label>
                
                    <?php echo form_input(array('id' => 'username', 'name' => 'username', 'size' => 20, 'style' => 'font-size:20px')); ?>
                
            </li>
            <li>
                <label>Password:</label>
                    <?php echo form_password(array('id' => 'password', 'name' => 'password', 'size' => 20, 'style' => 'font-size:20px')); ?>
            </li>
            <li>
                <label>Retype password:</label>
                    <?php echo form_password(array('id' => 'password_retype', 'name' => 'password_retype', 'size' => 20, 'style' => 'font-size:20px')); ?>
            </li>
             <li>
                <label>Type:</label>
                <?php
                    $options = array(
                      '1'  => 'Expert',
                      '2'    => 'Normal',
                    );
                    $extra = '';
                    
                    echo form_dropdown('type', $options, '2', $extra);
                    
                ?>
            </li>
            <li>
            <?php
                if ($this->session->flashdata('add_error'))
                    echo 'Failed register';
                elseif ($this->session->flashdata('add_ok'))
                    echo 'Register successfully';
                echo validation_errors(); 
            ?>
			</li>
			<li>

                <button type="submit"><img src="<?php echo base_url()?>img/login_button.png" width="100" border="none" /></button>
			</li>
		</ul>
		
		<?php echo form_close(); ?>	
	</div>

</body>
</html>