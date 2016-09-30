<?php
namespace Blog\Views\Articles;

use Tiimber\View;
use Tiimber\ViewException;
use Tiimber\Session;

use RedBeanPHP\R;

use Blog\Entities\Article;

class ShowView extends View
{

  const EVENTS = [
    'request::article::show' => 'content'
  ];

  const TPL = <<<EOF
{{#user}}
  <form method="post">
    <input type="hidden" name="id" value="{{article.id}}">
    <p><input type="text" name="title" placeholder="Title" value="{{article.title}}"></p>
    <p><textarea name="content">{{article.content}}</textarea></p>
    <p><button type="submit">Submit</button></p>
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
    $this->article = R::load('article', (integer)$args['id']);
  }

  public function render()
  {
    if ($this->article->id === 0 && !Session::load()->has('user')) {
      $this->raise(ViewException::NOT_FOUND);
    }

    return ['article' => $this->article, 'user' => Session::load()->has('user')];
  }
}
