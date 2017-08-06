<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

use App\Traits\Entities\UsingId;
use App\Traits\Entities\UsingVersion;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use App\Traits\Entities\Deleteable;


/**
 * @ORM\Entity
 * @ORM\Table(name="patterns")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Pattern
{
  use UsingId, UsingVersion, Timestamps, Deleteable;
  
  public function __construct()
  {
    $this->productVariations = new ArrayCollection(); 
  }

  /**
   * @ORM\Column(type="string", name="file")
   * @var string
   */
  protected $file;

  /**
   * @ORM\OneToMany(targetEntity="ProductVariation", mappedBy="pattern")
   * @var ArrayCollection|ProductVariation[]
   */
  protected $productVariations;

  public function getFile()
  {
    return $this->file;
  }

  public function setFile(string $file)
  {
    $this->file = $file;
  }
 
  public function getProductVariations()
  {
    return $this->productVariations;
  }

}

