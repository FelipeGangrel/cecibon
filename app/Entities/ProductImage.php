<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

use App\Traits\Entities\UsingId;
use App\Traits\Entities\UsingVersion;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use App\Traits\Entities\Deleteable;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_images")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class ProductImage
{
  use UsingId, UsingVersion, Timestamps, Deleteable;

  /**
   * @ORM\Column(type="string", name="file")
   * @var string
   */
  protected $file;

  /**
   * @ORM\Column(type="boolean", name="is_featured")
   * @var boolean
   */
  protected $isFeatured;

  /**
   * @ORM\ManyToOne(targetEntity="Product", inversedBy="productImages")
   * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
   * @var Product
   */
  protected $product;

  public function getFile()
  {
    return $this->file;
  }

  public function setFile(string $file)
  {
    $this->file = $file;
  }

  public function getIsFeatured()
  {
    return $this->isFeatured;
  }

  public function setIsFeatured(boolean $isFeatured)
  {
    $this->isFeatured = $isFeatured;
  }

  public function getProduct()
  {
    return $this->product;
  }

  public function setProduct(Product $product)
  {
    $this->product = $product;
  }


}