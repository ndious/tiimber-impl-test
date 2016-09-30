<?php

namespace Blog\Views\Errors;

use Tiimber\View;

class NotFoundView extends View
{
  const EVENTS = [
    'error::404' => 'content'
  ];
  
  const TPL = <<<EOF
<div>Page not found</div>
EOF;
}