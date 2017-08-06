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
 * @ORM\Table(name="products")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Product
{
  use UsingId, UsingVersion, Timestamps, Deleteable;
  
  public function __construct()
  {
    $this->productVariations = new ArrayCollection(); 
    $this->productImages = new ArrayCollection(); 
  }

  /**
   * @ORM\Column(type="string")
   * @var string
   */
  protected $name;

  /**
   * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
   * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
   * @var Category
   */
  protected $category;

  /**
   * @ORM\OneToMany(targetEntity="ProductVariation", mappedBy="product")
   * @var ArrayCollection|ProductVariation[]
   */
  protected $productVariations;

  /**
   * @ORM\OneToMany(targetEntity="ProductImage", mappedBy="product")
   * @var ArrayCollection|ProductImage[]
   */
  protected $productImages;

  public function getName()
  {
    return $this->name;
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function getMinPrice()
  {
    $minPrice = PHP_INT_MAX;
    foreach($this->productVariations as $variation)
    {
      if($variation->getPrice() < $minPrice)
        $minPrice = $variation->getPrice();
    }
    return $minPrice;
  }

  public function getMaxPrice()
  {
    $maxPrice = PHP_INT_MIN;
    foreach($this->productVariations as $variation)
    {
      if($variation->getPrice() > $maxPrice)
        $maxPrice = $variation->getPrice();
    }
    return $maxPrice;
  }

  public function getCategory()
  {
    return $this->category;
  }

  public function setCategory(Category $category)
  {
    $this->category = $category;
  }

  public function getProductVariations()
  {
    return $this->productVariations;
  }

  public function getProductImages()
  {
    return $this->productImages;
  }

}
