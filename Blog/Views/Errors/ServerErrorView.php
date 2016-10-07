<?php

namespace Blog\Views\Errors;

use Tiimber\View;

class ServerErrorView extends View
{
  const EVENTS = [
    'error::500' => 'content'
  ];
  
  const TPL = <<<EOF
<div>{{message}}</div>
<pre>{{stack}}</pre>
EOF;

  private $error;
  
  public function onGet($request, $args)
  {
    $this->error = $args['error'];
  }
  
  public function render()
  {
    return [
      'message' => $this->error->getMessage(),
      'stack' => $this->error->getTraceAsString()
    ];
  }
}