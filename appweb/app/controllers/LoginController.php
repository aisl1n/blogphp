<?php

use Phalcon\Validation\Message;



class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function submitAction(){

    	$email = $this->request->getPost('email');
    	$senha = $this->request->getPost('senha');

		$usuario = Usuarios::findFirst(
		    [
		        'email = :email:',
		        'bind' => [
					'email' => $email,
					
		        ],
		    ]
		);
		if (!$usuario) {
			
			$this->flashSession->error('Usuário ou senha inválidos');    	
			return $this->response->redirect('login');
		}

		if (!$this->security->checkHash($senha, $usuario->senha)) {
			$this->flashSession->error('Usuario ou senha inválidos');    	
			return $this->response->redirect('login');
       	
		}

		$this->session->set('id', $usuario->id);
		$this->session->set('nome', $usuario->nome);
		$this->session->set('email', $usuario->email);
		
		$this->response->redirect('posts');
		}

		public function logoutAction(){

			$this->session->destroy();
			$this->flashSession->error('Até Mais!');   
			$this->response->redirect('login');   
			
		}
	
		
    }

 



