<?php
// Initialise Auto-loading
spl_autoload_register(function ($sClass) {

	if (strpos($sClass, 'JsonData\\') === 0) {

		$sClassPath = str_replace('\\', '/', str_replace('JsonData\\', '', $sClass)) . '.php';
		$sFullClassPath = dirname(__FILE__) . '/src/' . $sClassPath;

		if (is_file($sFullClassPath)) {
			require_once $sFullClassPath;
		}

	}

});