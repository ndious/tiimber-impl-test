<?php
namespace Blog;

use Tiimber\Traits\ApplicationTrait as Tiimber;

use RedBeanPHP\R;

class Application
{
  use Tiimber;

  public function start()
  {
    $this->setRoot(dirname(__DIR__));
    $this->setCacheFolder(dirname(__DIR__) . '/cache');
    R::setup('mysql:host=localhost;dbname=c9', 'dious', '');
    $this->chop();
  }
}
