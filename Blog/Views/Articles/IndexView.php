<?php
namespace Blog\Views\Articles;

use Tiimber\View;
use Tiimber\Database;
use Tiimber\Utilities\Text;

class IndexView extends View
{
  const EVENTS = [
    'request::article::index' => 'content'
  ];

  const TPL = <<<TPL
<ul>
  {{#article}}
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
  {{/article}}
  {{^article}}
    <li>No article available yet.</li>
  {{/article}}
</ul>
TPL;

  public function render()
  {
    $mapper = Database::getMapper('Blog\Entities\Article');
    $truncate = function () {
      return function ($text) {
        return Text::crop($text, 50);
      };
    };
    return ['article' => $mapper->all()->limit(10)->toArray(), 'truncate' => $truncate];
  }
}
