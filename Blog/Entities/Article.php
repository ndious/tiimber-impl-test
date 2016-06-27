<?php
namespace Blog\Entities;

use Spot\Entity;

class Article extends Entity
{
  protected static $table = 'articles';

  public static function fields()
  {
    return [
      'id' => ['type' => 'string', 'required' => true, 'primary' => true],
      'title' => ['type' => 'string', 'required' => true],
      'content' => ['type' => 'text', 'required' => true],
      'status' => ['type' => 'boolean', 'default' => false]
    ];
  }
}
