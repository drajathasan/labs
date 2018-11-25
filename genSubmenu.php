<?php
/**
* Menu Generator
*
* Copyright (C) 2015 Eddy Subratha (eddy.subratha@gmail.com)
* Copyright (C) 2018 Drajat Hasan (drajathasan20@gmail.com)
*
* Some modification and improve code from SLiMS Custom Menu Layout
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
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
*
*/

// be sure that this file not accessed directly
if (!defined('INDEX_AUTH')) {
    die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
    die("can not access this file directly");
}

include_once '../sysconfig.inc.php';

/* Create Main Menu */
function mainMenu()
{
	global $dbs;
	$modules_dir 	  = 'modules';
	$_mods_q = $dbs->query('SELECT * FROM mst_module');
	while ($_mods_d = $_mods_q->fetch_assoc()) {
    	$module_list[] = array('name' => $_mods_d['module_name'], 'path' => $_mods_d['module_path'], 'desc' => $_mods_d['module_desc']);
  	}

  	if ($module_list) {
  		$_menu = '';
  		foreach ($module_list as $_module) {
  			$_mod_dir = $_module['path'];
  			if (isset($_SESSION['priv'][$_module['path']]['r']) && $_SESSION['priv'][$_module['path']]['r'] && file_exists($modules_dir.DS.$_mod_dir)) {
	  			$_menu .= '<div class="modsubmenu '.$_module['name'].'-menu hide">';
				$_menu .= '<div class="module-head">';
				$_menu .= '<b class="circlemod">'.ucfirst(substr($_module['name'], 0, 1)).'</b>&nbsp;';
				$_menu .= '<strong>'.ucwords(str_replace('_', ' ', $_module['name'])).'</strong>';
				$_menu .= '</div>';
				$_menu .= '<div class="scroll">';
				$_menu .= generateSubmenu($_module['path']);
				$_menu .= '</div>';
				$_menu .= '</div>';
			}
  		}
  		return $_menu;
  	}
}

/* Create Navbar Menu */
function nav_menu()
{
	global $dbs;
	$_mods_q = $dbs->query('SELECT * FROM mst_module');
	$nav_menu  = '<ul>';
	$nav_menu .= '<li><a class="dshb" href="javascript:void(0)"><i class="fa fa-dashboard"></i></a></li>';
	$nav_menu .= '<li><a class="opac" href="../index.php"><i class="fa fa-desktop"></i></a></li>';
	while ($_mods_d = $_mods_q->fetch_assoc()) {
		$modules_dir = 'modules';
		$_mod_dir = $_mods_d['module_path'];
		if (isset($_SESSION['priv'][$_mods_d['module_path']]['r']) && $_SESSION['priv'][$_mods_d['module_path']]['r'] && file_exists($modules_dir.DS.$_mod_dir)) {
			$nav_menu .= '<li><a class="navmod" mod="'.$_mods_d['module_name'].'" href="javascript:void(0)">'.ucwords(str_replace('_', ' ', __($_mods_d['module_name']))).'</a></li>';
		}
	}
	$nav_menu .= '</ul>';
	return $nav_menu;
}

function getLastAddress($str_address)
{
	// exploding
	$slice = explode('/', $str_address);
	// get all string
	$sum = count($slice);
	$jum = $sum-1;
	// set out
	$result = substr($slice[$jum], 0, strpos($slice[$jum], "."));
	return $result;
}

/* Generate Submenu */
function generateSubmenu($path)
{
	global $dbs;
	// Checking file
	$_submenu_file 	= 'modules'.DS.$path.DS.'submenu.php';
    if (file_exists($_submenu_file)) {
        include $_submenu_file;
    } else {
        include 'default/submenu.php';
    }

	// Create output
	$submenu = '<ul>';
	foreach ($menu as $key => $subMenu) {
		if ($subMenu[0] == 'Header') {
			$submenu .= '<li class="sub-header"><i class="fa fa-thumb-tack"></i>&nbsp;'.$menu[$key][1].'</li>';
		} else {
			$submenu .= '<li class="sub-header-menu" con="'.$menu[$key][0].'"><a class="a-sub" path="'.$path.'" file="'.getLastAddress($menu[$key][1]).'" href="'.$menu[$key][1].'" title="'.$menu[$key][2].'"><i class="a-icon fa fa-file-text-o"></i>'.$menu[$key][0].'</a></li>';
		}
	}
	$submenu .= '</ul>';

	return $submenu;	
}

?>