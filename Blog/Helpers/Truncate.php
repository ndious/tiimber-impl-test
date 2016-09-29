<?php
namespace BLog\Helpers;

use Serializable;

use Tiimber\Utilities\Text;

class Truncate implements Serializable
{
  public function render(string $text): string
  {
    return Text::crop($text, 50);
  }
  
  public function serialize(): string
  {
    return self::class;
  }
  
  public function unserialize($serialized): Truncate
  {
    return $this;
  }
}