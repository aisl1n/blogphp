<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
  
    	$posts = Posts::find();

        $this->view->posts = $posts;

   
    }


}

