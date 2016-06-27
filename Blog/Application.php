<?php
namespace Blog;

use Tiimber\Traits\ApplicationTrait as Tiimber;

class Application
{
  use Tiimber;

  public function start()
  {
    $this->setRoot(dirname(__DIR__));
    $this->setCacheFolder('/tmp/tiimber');
    $this->chop();
  }
}
