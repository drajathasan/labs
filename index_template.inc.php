<?php
/**
 * Labs Template
 *
 * Copyright (C) 2018 Drajat Hasan (drajathasan20@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Include additional function
include 'genSubmenu.php';
include 'labshome.php';
include 'additionalFunc.php';

// Gen help page
if (isset($_POST['helpFile'])) {
	$fileName = (string)$_POST['helpFile'];
	$module   = strtolower($_POST['helpPath']);
	$read = readHelp($module, $fileName);

	if (!$read) {
		echo "Tidak ada dokumentasi!";
	} else {
		echo $read;
	}
	exit();
}
?>
<!-- 
 _          _           _                       _       _       
| |    __ _| |__  ___  | |_ ___ _ __ ___  _ __ | | __ _| |_ ___ 
| |   / _` | '_ \/ __| | __/ _ \ '_ ` _ \| '_ \| |/ _` | __/ _ \
| |__| (_| | |_) \__ \ | ||  __/ | | | | | |_) | | (_| | ||  __/
|_____\__,_|_.__/|___/  \__\___|_| |_| |_| .__/|_|\__,_|\__\___|
                                         |_|   
 												By : Drajat Hasan
 -->
<!DOCTYPE html>
<html class="no-js">
<head>
  <title><?php echo $page_title;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0" />
  <meta http-equiv="Expires" content="Sat, 26 Jul 1997 05:00:00 GMT" />
  <!-- Icon -->
  <link rel="icon" href="<?php echo SWB; ?>webicon.ico" type="image/x-icon"/>
  <link rel="shortcut icon" href="<?php echo SWB; ?>webicon.ico" type="image/x-icon"/>
  <!-- CSS -->
  <link href="<?php echo SWB; ?>template/core.style.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo JWB; ?>colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo JWB; ?>chosen/chosen.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo JWB; ?>jquery.imgareaselect/css/imgareaselect-default.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo AWB; ?>admin_template/<?php echo $sysconf['admin_template']['theme'] ?>/assets/css/main.css">
  <!-- Javascript -->
  <script type="text/javascript" src="<?php echo JWB; ?>jquery.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>updater.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>gui.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>form.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>calendar.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>keyboard.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>chosen/chosen.jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>chosen/ajax-chosen.min.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>tooltipsy.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>colorbox/jquery.colorbox-min.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>jquery.imgareaselect/scripts/jquery.imgareaselect.pack.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>webcam.js"></script>
  <script type="text/javascript" src="<?php echo JWB; ?>scanner.js"></script>
  <!-- Bootstrap Javascript -->
  <script type="text/javascript" src="<?php echo AWB; ?>admin_template/<?php echo $sysconf['admin_template']['theme'] ?>/assets/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="<?php echo AWB; ?>admin_template/<?php echo $sysconf['admin_template']['theme'] ?>/assets/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Header -->
	<header class="nav">
		<div class="nav-content">
			<div class="right">
				<a style="right: 50px;" class="circle-right help" title="<?php echo __('Help');?>" path="" file="" lang="<?php echo $sysconf['default_lang']; ?>" href="javascript:void(0)"><i class="fa fa-question-circle"></i></a>
				<div class="btn-group">
				  <img class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="<?php echo genImageSrc();?>">
				  <div class="dropdown-menu">
				    <a class="dropdown-item u-profile" href="javascript:void(0)"><strong>Admin</strong><br><small>Librarian</small></a>
				    <a class="dropdown-item u-profile" href="javascript:void(0)">Edit Profile</a>
				    <a class="dropdown-item a-template notAJAX openPopUp" title="About me" href="<?php echo AWB;?>admin_template/labs/aboutme.html">About template</a>
				    <a class="dropdown-item" href="logout.php">Logout</a>
				  </div>
				</div>
			</div>
			<div class="left">
				<h4 class="left"><img class="brand-logo" src="<?php echo AWB; ?>admin_template/<?php echo $sysconf['admin_template']['theme'] ?>/assets/img/logo-min.png"/>&nbsp;<span>SL<b style="color:#fca326">i</b>MS</span></h4>
				<div class="module">
					<?php echo nav_menu();?>
				</div>
				<!-- <div class="btn-group">
				  <i class="other-mod fa fa-plus dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
				  <div class="dropdown-menu">
				    <a class="dropdown-item" href="#">Edit module priority</a>
				    <a class="dropdown-item" href="#">Other module</a>
				  </div>
				</div> -->
			</div>
		</div>
		<div class="my-modal hide">
			<div class="my-modal-content">
				
			</div>
			<button class="close-modal btn btn-danger right" style="margin-right: 10px;"><?php echo __('Close');?></button>
		</div>
	</header>
	<!-- End Header -->

	<!-- Dashboard section layout -->
	<div class="container main-layout">
		<div class="row">
			<div class="msgbox bg-danger"><?php echo $errStr;?></div>
			<div class="top-item">
				<img class="wel-pic" src="<?php echo genImageSrc();?>"/>
				<h3 class="wel-msg">
					Hai, <?php echo ucfirst($_SESSION['uname']);?>!
					<br>
					Welcome to SLiMS 8.3.1
				</h3>
			</div>
		</div>
		<div class="row align-items-end">
			<div class="col">
		      <i class="fa fa-bookmark bibco-text"></i>
		      <h3>Bibliography</h3>
		      <p>Manage your bibliographic/catalog and items/copies database</p>
		      <button class="navmod right btn btn-primary" mod="bibliography">Open Module</button>
		    </div>
		    <div class="col">
		      <i class="fa fa-clock-o circo-text"></i>
		      <h3>Circulation</h3>
		      <p>Module for doing library items circulation such as loan and return</p>
		      <button class="navmod right btn btn-primary" mod="circulation">Open Module</button>
		    </div>
			<div class="col">
		      <i class="fa fa fa-file-text-o repco-text"></i>
		      <h3>Reporting</h3>
		      <p>Real time and dynamic report about library collections and circulation</p>
		      <button class="navmod right btn btn-primary" mod="reporting">Open Module</button>
		    </div><br>
		</div>
		<div class="row">
			<div class="msgbox a-center bg-success" style="cursor:pointer"><b class="fa fa-plus"></b> Add Shorcut</div>
		</div>
	</div> 
	<!-- End section -->

	<!-- Module section layout -->
	<div class="layout hide">
		<div id="submenu">
			<div id="sidepan">
				<?php echo mainMenu();?>
			</div>
		</div>
		<div class="statusbar msgbox bg-primary">Module <i class="fa fa-angle-right"></i> <b class="status-mod"></b> </div>
		<div class="loader bg-primary hide"></div>
		<div id="mainContent">
			<?php 
			if (isset($_GET['mod']) AND $_GET['mod'] == 'system') {
				?>
				<script type="text/javascript">
				    $('.container').addClass('hide');
					$('.layout').removeClass('hide');
					$('.modsubmenu').addClass('hide');
					$('.system-menu').removeClass('hide');
					$('#mainContent').simbioAJAX('<?php echo MWB;?>system/index.php');
				</script>
				<?php
			}
			?>
		</div>
	</div>
	<!-- End section data-toggle="modal" data-target="#myModal" -->
	
	<!-- fake submit iframe for search form, DONT REMOVE THIS! -->
  	<iframe name="blindSubmit" style="visibility: hidden; width: 0; height: 0;"></iframe>
  	<!-- fake submit iframe -->
	
	<!-- Jquery -->
	<script type="text/javascript">
		/* Navbar action */
		$('.navmod').click(function(){ 
			// module
			var mod_active = $(this).attr('mod');
			$('.navmod').removeClass('mod-active');
			// Add active
			$(this).addClass('mod-active');
			// hide main layout
			$('.main-layout').addClass('hide');
			// show module layout
			$('.layout').removeClass('hide');
			// hide other mod sub menu
			$('.modsubmenu').addClass('hide');
			// show up modul menu
			$('.'+mod_active+'-menu').removeClass('hide');
			// set status
			$('.status-mod').html(mod_active);
			// help
			$('.help').attr('path', mod_active);
			$('.help').attr('file', 'index');
			// Set main content
			$('#mainContent').html('<img src="<?php echo AWB; ?>admin_template/labs/assets/img/loading.gif">Please wait, loading content.');
			$('#mainContent').simbioAJAX('<?php echo MWB;?>'+mod_active+'/index.php');
			// Slide up it
			$('.my-modal').slideUp();
		});

		/* Dashboard */
		$('.dshb').click(function(){
			// hidden main layout
			$('.main-layout').removeClass('hide');
			// Hiden layout
			$('.layout').addClass('hide');
			// Remove border
			$('.navmod').removeClass('mod-active');
			// Remove help attribute
			$('.help').attr('path', '');
			$('.help').attr('file', '');
		});
		
		/* Opac */
		$('.opac').bind('click', function(evt) {
	    	evt.preventDefault();
	    	top.jQuery.colorbox({iframe:true,
	    	  href: $(this).attr('href'),
	          width: function() { return parseInt($(window).width())-50; },
	          height: function() { return parseInt($(window).height())-50; },
	          title: function() { return 'Online Public Access Catalog'; } }
	        );
    	});
		
		/* User profile */
		$('.u-profile').click(function(){
			$('.main-layout').addClass('hide');
			$('.layout').removeClass('hide');
			$('#mainContent').simbioAJAX('<?php echo MWB;?>system/app_user.php?changecurrent=true&action=detail');
			$('.modsubmenu').addClass('hide');
			$('.system-menu').removeClass('hide');
		});

		/* Sub */
		$('.a-sub').click(function(){
			var path_des  = $(this).attr('path');
			var file_des = $(this).attr('file');
			// Set attrib value
			$('.help').attr('path', path_des);
			$('.help').attr('file', file_des);
		});

		/* Help */
		$('.help').click(function(){
			// Default variabel
			var dir_path  = $(this).attr('path');
			var file_name = $(this).attr('file');
			var defLang   = $(this).attr('lang');
			// Post process
			$.post("<?php echo $_SERVER['PHP_SELF'];?>", {helpFile:file_name,helpPath:dir_path}, function(result){
				$('.my-modal').slideDown();
				$('.my-modal-content').html(result);	
			});
		});

		/* Close modal */
		$('.close-modal').click(function(){
			$('.my-modal').slideUp();
			$('.my-modal-content').empty();
		});

		/* Shorcut */
		$('.a-center').click(function(){
			alert('Next release :)');
		});
	</script>
</body>
</html>