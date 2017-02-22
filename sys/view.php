<?php

	namespace X\Sys;

	class View extends \ArrayObject{
		// fa falta la \ perque es un object predefinit de php

		protected $output;
   		protected $dataTable;
   		public function __construct($dataView,$dataTable=null){
     	parent::__construct($dataView,\ArrayObject::ARRAY_AS_PROPS);
      	if($dataTable!=null){
          	$this->dataTable=$dataTable;
      	}
      	}

   		public function render($fileview){
      		ob_start();
      		include APP.'tpl'.DS.$fileview;
      		return ob_get_clean();// el clean no funciona si no hi ha el ob_start();
   		}
   		function show(){
      	echo $this->output;
    	}
	}