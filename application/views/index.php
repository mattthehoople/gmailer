<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gmail Mailer</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
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
		font-size: 19px;
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
	</style>
</head>
<body>

<div id="container">
	<h1>Mailer</h1>

	<div id="body">
		
		<p>Pick an email and send it from your GMail account .</p>

		<p>Listing files found in directory:</p>
		<code><?php echo $directory; ?></code>
	
		<?php $attributes = array('class' => 'email', 'id' => 'myform');

			echo form_open(site_url('mailer/index'));
			
			echo '<label for="target">Target Email Address</label>'.form_input('target').'<br /><br />';
			
			echo '<label for="html">HTML file</label>'.form_dropdown('html', $map, 'large').'<br /><br />';

			echo '<label for="text">Plain Text file</label>'.form_dropdown('text', $map, 'large').'<br /><br />';	

			echo form_submit('submit', 'Send it').'<br />';
			
			echo form_close();
			
		?>	
		
		<?php if(isset($debug)){?>
			<p>Attempted send. Debug below.</p>
			<?php echo $debug; 
		}?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>