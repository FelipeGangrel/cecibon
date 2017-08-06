<?php

namespace App\Traits\Entities;

use Doctrine\ORM\Mapping as ORM;

trait UsingId
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   * @var integer
   */
  protected $id;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

}