<?php
namespace Blog\Views\Articles;

use Tiimber\View;
use Tiimber\Utilities\Text;

use RedBeanPHP\R;

class IndexView extends View
{
  const EVENTS = [
    'request::article::index' => 'content'
  ];

  const TPL = <<<EOF
{{#articles}}
  <ul>
    <li>
      <h2>{{title}}</h2>
      <p>
        <a href="/{{id}}">
          {{#truncate}}
            {{content}}
          {{/truncate}}
        </a>
      </p>
    </li>
  </ul>
{{/articles}}
{{^articles}}
  <p>No article available yet.</p>
{{/articles}}
EOF;

  public function render()
  {
    $articles = R::findAll('article','ORDER BY id DESC LIMIT 10');
    return ['articles' => array_values($articles)];
  }
}
