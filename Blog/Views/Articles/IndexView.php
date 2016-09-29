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
<ul>
  {{#articles}}
    <li>
      <h2>{{title}}<h2>
      <p>
        <a href="/{{id}}">
          {{#truncate}}
            {{content}}
          {{/truncate}}
        </a>
      </p>
    </li>
  {{/articles}}
  {{^articles}}
    <li>No article available yet.</li>
  {{/articles}}
</ul>
EOF;

  public function render()
  {
    $articles = R::findAll('article','ORDER BY id DESC LIMIT 10');
    return ['articles' => array_values($articles)];
  }
}
