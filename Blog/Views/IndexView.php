<?php
namespace Blog\Views;

use Tiimber\View;

class IndexView extends View
{
  const EVENTS = [
    'request::index' => 'content'
  ];

  const TPL = <<<'EOS'
<p>hello {{planet}}.</p>
<a href="/new">New article</a>
EOS;

  public function render()
  {
    return ['planet' => 'earth'];
  }
}
