<?php
namespace Blog\Views\User;

use Tiimber\View;
use Tiimber\Session;

class UserAuthView extends View
{
  const EVENTS = [
    'request::index' => 'login'
  ];

  const TPL = <<<'EOS'
{{#user}}
  <b>Hello {{username}}!</b>
{{/user}}
{{^user}}
  <form method="post" action="/">
    <input type="text" name="username" placeholder="Username">
    <button type="submit">Submit</button>
  </form>
{{/user}}
EOS;

  private $user;

  public function onGet($request, $args)
  {
    if (Session::load()->has('user')) {
      $this->user = ['username' => Session::load()->get('user')];
    }
  }

  public function onPost($request, $args)
  {
    Session::load()->set('user', $request->post->get('username'));
    $this->user = ['username' => $request->post->get('username')];
  }

  public function render()
  {
    return ['user' => $this->user];
  }
}
