<?php
namespace Blog\Views\Articles;

use Tiimber\View;
use Tiimber\ViewException;
use Tiimber\Session;
use Tiimber\Traits\RedirectTrait;

use RedBeanPHP\R;

use Blog\Entities\Article;

class ShowView extends View
{
  use RedirectTrait;

  const EVENTS = [
    'request::article::show' => 'content'
  ];

  const TPL = <<<EOF
{{#user}}
  <form method="post">
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
  
  public function prepare($id)
  {
    if ($id !== 0) {
      $this->article = R::load('article', $id);
    } else {
      $this->article = R::dispense('article');
    }
  }

  public function onGet($request, $args)
  {
    $this->prepare((integer)$args['id']);
  }
  
  public function onPost($request, $args)
  {
    $this->prepare((integer)$args['id']);

    $this->article->title = $request->post->get('title');
    $this->article->content = $request->post->get('content');
    $this->article->status = true;

    $id = R::store($this->article);
    $this->redirect('/'.$id);
  }

  public function render()
  {
    if ($this->article->id === 0 && !Session::load()->has('user')) {
      $this->raise(ViewException::NOT_FOUND);
    }

    return ['article' => $this->article, 'user' => Session::load()->has('user')];
  }
}
