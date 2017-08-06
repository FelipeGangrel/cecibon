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
 * @ORM\Table(name="product_variations")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class ProductVariation
{
  use UsingId, UsingVersion, Timestamps, Deleteable;

  /**
   * Stock Keeping Unit // Um codigo para o produto
   * @ORM\Column(type="string", nullable=true)
   * @var string
   */
  protected $sku;

  /**
   * ORM\Column(type="string")
   * @var string
   */
  protected $name;

  /**
   * @ORM\Column(type="decimal", precision=10, scale=2)
   * @var double
   */
  protected $price;

  /**
   * @ORM\Column(type="integer")
   * @var integer
   */
  protected $stock;

  /**
   * @ORM\Column(type="boolean", name="is_unlimited", options={"default":false})
   * @return boolean
   */
  protected $isUnlimited;

  /**
   * @ORM\ManyToOne(targetEntity="Product", inversedBy="productVariations")
   * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
   * @var Product
   */
  protected $product;

  /**
   * @ORM\ManyToOne(targetEntity="Pattern", inversedBy="productVariations")
   * @ORM\JoinColumn(name="pattern_id", referencedColumnName="id")
   * @var Pattern
   */
  protected $pattern;

  public function getSku()
  {
    return $this->sku;
  }

  public function setSku(string $sku)
  {
    $this->sku = $sku;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setPrice(double $price)
  {
    $this->price = $price;
  }

  public function getStock($stock)
  {
    return $this->stock;
  }

  public function setStock(integer $stock)
  {
    $this->stock = $stock;
  }

  public function increaseStock(integer $amount)
  {
    $this->stock += $amount;
  }

  public function decreaseStock(integer $amount)
  {
    $this->stock -= $amount;
  }

  public function getIsUnlimited()
  {
    return $this->isUnlimited;
  }

  public function setIsUnlimited(boolean $isUnlimited)
  {
    $this->isUnlimited = $isUnlimited;
  }

  public function getProduct()
  {
    return $this->product;
  }

  public function setProduct(Product $product)
  {
    $this->product = $product;
  }

  public function getPattern()
  {
    return $this->pattern;
  }

  public function setPattern(Pattern $pattern)
  {
    $this->pattern = $pattern;
  }


}