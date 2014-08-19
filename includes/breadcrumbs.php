<?php
function breadcrumbs($separator = ' / ', $home = 'Inicio') {
	$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/admin/';
	$breadcrumbs = array('<a href="'. $base .'">'. $home .'</a>');
	$last = end(array_keys($path));
	foreach ($path as $x => $crumb) {
		if ($crumb!='admin') {
			$title = ucwords(str_replace(array('.php', '_'), array('', ' '), $crumb));
			if ($x != $last ) {
				$breadcrumbs[] = '<a href="'. $base . $crumb .'">'. $title .'</a>';
			} else { $breadcrumbs[] = $title;
		}
		}
	}
	return implode($separator, $breadcrumbs);
} ?>