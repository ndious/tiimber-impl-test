<?php
namespace Blog\Views;

use Tiimber\View;

class IndexView extends View
{
  const EVENTS = [
    'request::index' => 'content'
  ];

  const TPL = <<<EOF
<p>hello {{planet}}.</p>
EOF;

  public function render()
  {
    return ['planet' => 'earth'];
  }
}
