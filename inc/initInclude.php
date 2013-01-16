<?php

$pathClass	= INSTALL_PATH."classes";
$pathConf	= INSTALL_PATH."config";
$pathFCT	= INSTALL_PATH."fct";
$pathInc	= INSTALL_PATH."inc";
$pathPages	= INSTALL_PATH."pages";
$pathModals = INSTALL_PATH."modals";
$pathFont	= INSTALL_PATH."font";

set_include_path(
	get_include_path() .
	PATH_SEPARATOR . $pathClass .
	PATH_SEPARATOR . $pathConf .
	PATH_SEPARATOR . $pathFCT .
	PATH_SEPARATOR . $pathInc .
	PATH_SEPARATOR . $pathPages .
	PATH_SEPARATOR . $pathModals .
	PATH_SEPARATOR . $pathFont
);

//echo get_include_path();

?>