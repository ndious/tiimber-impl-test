<?php
namespace Blog\Layouts;

use Tiimber\Layout;

class DefaultLayout extends Layout
{
  const TPL = <<<'EOS'
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{title}}</title>
  </head>
  <body>
    <header>
      {{{navigation}}}
    </header>
    <div>
      {{{content}}}
      <p>
        {{{login}}}
      </p>
    </div>
  </body>
</html>
EOS;

}
