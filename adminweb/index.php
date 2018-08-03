  <!DOCTYPE html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>.:: Administrator -  Website ::.</title>
  <link rel="shortcut icon" href="../favicon.png" />
  
  <link rel="stylesheet" href="css/style.default.css" type="text/css" />
  <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
  
  </head>
  <body class="loginbody">

  <div class="loginwrapper">
  <div class="loginwrap zindex100 animate2 bounceInDown">
  <h1 class="logintitle"><span class="iconfa-lock"></span>HALAMAN ADMINISTRATOR 
  <span class="subtitle">Silahkan masukan username dan password anda.</span></h1>
  
  <div class="loginwrapperinner">
  <form id="loginform" action="cek_login.php" method="post">
  <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Username" /></p>
  <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Password" /></p>
  <p class="animate6 bounceIn"><button class="btn btn-default btn-block">LOGIN</button></p>
  </form>
  </div>
  
  </div>
  <div class="loginshadow animate3 fadeInUp"></div>
  </div>

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.loginwrap').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	
	jQuery('#username,#password').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	jQuery('#loginform button').click(function(){
		if(!jQuery.browser.msie) {
			if(jQuery('#username').val() == '' || jQuery('#password').val() == '' || jQuery('#kode').val() == '') {
				if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
				if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
				if(jQuery('#kode').val() == '') jQuery('#kode').addClass('error'); else jQuery('#kode').removeClass('error');
				jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
					jQuery(this).removeClass('animate0 wobble');
				});
			} else {
				jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
					jQuery('#loginform').submit();
				});
			}
			return false;
		}
	});
});
  </script>
  </body>
  </html>
