<?php
namespace Blog\Views;

use Tiimber\View;

class IndexView extends View
{
  const EVENTS = [
    'request::index' => 'content'
  ];

  const TPL = <<<'EOS'
hello {{planet}}.
<a href="/">test</a>
EOS;

  public function render()
  {
    return ['planet' => 'earth'];
  }
}
