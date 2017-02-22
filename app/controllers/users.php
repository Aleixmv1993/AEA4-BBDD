<?php

namespace X\App\Controllers;

   use X\Sys\Controller;


   class Users extends Controller{
   		

   		public function __construct($params){
            parent::__construct($params);
            $this->dataView=array(
               'title'=>'Users');
            $this->model=new \X\App\Models\mHome();
            $this->view =new \X\App\Views\vHome($this->dataView);
            
         }
   		function home(){
            
         }
   }