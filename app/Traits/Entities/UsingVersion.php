<?php

namespace App\Traits\Entities;

use Doctrine\ORM\Mapping as ORM;

trait UsingVersion
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Version
   */
  protected $version;

}