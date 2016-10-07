<?php
namespace Blog\Actions\User;

use Tiimber\{Action, Session, Traits\RedirectTrait};

class AuthAction extends Action
{
  use RedirectTrait;

  const EVENTS = [
    'request::user::auth'
  ];
  
  
  public function onPost($request, $args)
  {
    $this->log('info', 'On post mother fucker !!!!!');
    Session::load()->set('user', $request->post->get('username'));
    $this->redirect('/');
  }
}
