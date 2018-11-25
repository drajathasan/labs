<?php
/**
* Additional Function
*
* Copyright (C) 2018 Drajat Hasan (drajathasan20@gmail.com)
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



function genImageSrc()
{
	$src = AWB.'admin_template/labs/assets/img/user.svg';
	// Check the image session
	if (isset($_SESSION['upict']) AND ($_SESSION['upict'] != 'person.png')) {
		// Checking the availibility of user image
		if (file_exists(IMGBS.'persons/'.$_SESSION['upict'])) {
			$src = SWB.'images/persons/'.$_SESSION['upict'];
			return $src;
		}
	}
	return $src;
}

function readHelp($module, $fileName)
{
	global $sysconf;
	require LIB.'parsedown/Parsedown.php';
	if (file_exists(HELP.'/'.$sysconf['default_lang'].'/'.$module.'/'.$fileName.'.md')) {
		$html = file_get_contents(HELP.'/'.$sysconf['default_lang'].'/'.$module.'/'.$fileName.'.md');
		$Parsedown = new Parsedown();
		return $Parsedown->text($html);
	} else {
		return false;
	}
}