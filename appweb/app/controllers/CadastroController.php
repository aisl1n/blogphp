<?php

class CadastroController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function submitAction(){

    	$usuario = new Usuarios();
    	$usuario->nome = $this->request->getPost('nome');
    	$usuario->email = $this->request->getPost('email');
    	$usuario->senha = $this->security->hash($this->request->getPost('senha'));

    	if (!$usuario->save()) {
       		$this->flashSession->error('Erro tente novamente');    	
       		return $this->response->redirect('cadastro'); 
        }

        $this->view->render('cadastro', 'cadastrado');
    }

}

