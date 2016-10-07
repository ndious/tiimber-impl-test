<?php
namespace Blog\Views\User;

use Tiimber\{View, Session};

class UserAuthView extends View
{
  const EVENTS = [
    'render::navigation' => 'login'
  ];

  const TPL = <<<EOF
{{#user}}
  <b>Hello {{username}}!</b>
{{/user}}
{{^user}}
  <form method="post" action="/user/auth">
    <input type="text" name="username" placeholder="Username">
    <button type="submit">Submit</button>
  </form>
{{/user}}
EOF;

  public function render()
  {
    return [
      'user' => Session::load()->has('user'),
      'username' => Session::load()->get('user')
    ];
  }
}
