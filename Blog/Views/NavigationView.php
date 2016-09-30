<?php

namespace Blog\Views;

use Tiimber\View;
use Tiimber\Session;

class NavigationView extends View
{
  const EVENTS = [
    'request::*' => 'navigation'
  ];
  
  const TPL = <<<EOF
<nav>
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/articles">Show articles</a></li>
    {{#user}}
      <li><a href="/new">New article</a></li>
    {{/user}}
  </ul>
</nav>
EOF;

  public function render()
  {
    return ['user' => Session::load()->has('user')];
  }
}