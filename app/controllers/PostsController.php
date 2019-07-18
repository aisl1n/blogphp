<?php
use Phalcon\Http\Request;

class PostsController extends \Phalcon\Mvc\Controller
{
	public function initialize(){

		if (!$this->session->has('nome')) {
            return $this->response->redirect('login');
        }
	}

    public function indexAction()
    {

    }

    public function submitAction(){

    	$post = new Posts();
        
        $post->post = $this->request->getPost('post');

        $post->titulo = $this->request->getPost('post');



    	$post->usuario_id = $this->session->get('id');

        if ($this->request->hasFiles()) {
            
            $files = $this->request->getUploadedFiles();
            // Print the real file names and sizes
            foreach ($files as $file) {
               	// Move the file into the application
                $file->moveTo(
                    'img/' . $file->getName()
                );
                $post->image = $file->getName();
            }

        }

        if($Usuario_id){
            
        }
    	if (!$post->save()) {
        	//$usuarios_password->getMessages();
       		$this->flashSession->error('Erro tente novamente');    	
       		return $this->response->redirect('posts'); 
        }

        $this->response->redirect('inicio');

    }
    
    
    public function excluirAction($id){
        $post = Posts::findFirst(
		    [
		        'id = :id:',
		        'bind' => [
					'id' => $id,
					
		        ],
		    ]
        );
        
        $post->delete();
        $this->response->redirect('inicio');
    }


}

