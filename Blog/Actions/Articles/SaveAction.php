<?php

namespace Blog\Actions\Articles;

use Tiimber\Action;
use Tiimber\Traits\RedirectTrait;

use RedBeanPHP\R;

class SaveAction extends Action
{
  use RedirectTrait;

  const EVENTS = [
    'request::article::show'
  ];
  
  private function prepare($id)
  {
    if ($id !== 0) {
      $this->article = R::load('article', $id);
    } else {
      $this->article = R::dispense('article');
    }
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
}