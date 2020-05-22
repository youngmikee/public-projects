<?php

class View {
	
    function __construct() {
        //echo 'this is the view';
    }

    public function render($name, $noInclude = false)
    {

		if ($noInclude == true) {
			require 'views/layout/header.php';
			require 'views/' . $name . '.php';	
			require 'views/layout/footer.php';
		}else{
			require 'views/' . $name . '.php';
		}
    }
	

}