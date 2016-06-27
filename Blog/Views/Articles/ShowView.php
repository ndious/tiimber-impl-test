<?php
namespace Blog\Views\Articles;

use Tiimber\View;
use Tiimber\Database;
use Tiimber\ViewException;

class ShowView extends View
{
  const EVENTS = [
    'request::article::show' => 'content'
  ];

  const TPL = <<<EOF
{{#user}}
  <form method="post" action="/">
    <input type="hidden" name="id" value="{{article.id}}">
    <input type="text" name="title" placeholder="Title" value="{{article.title}}">
    <textarea name="content">{{article.content}}</textarea>
    <button type="submit">Submit</button>
  </form>
{{/user}}
{{^user}}
  <h1>{{article.title}}</h1>
  <p>{{article.content}}</p>
{{/user}}
EOF;

  private $article;

  public function onGet($request, $args)
  {
    $mapper = Database::connect()->mapper('Blog\Entities\Artilce');
    $this->article = $mapper->get($args['id']);
  }

  public function render()
  {
    if (!$this->article && !Security::load()->getUser()) {
      $this->raise(ViewException::FORBIDEN);
    }
    return ['article' => $this->article];
  }
}
