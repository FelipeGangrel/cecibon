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
 * @ORM\Table(name="categories")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Category
{
  use UsingId, UsingVersion, Timestamps, Deleteable;

  public function __construct()
  {
    $this->products = new ArrayCollection();
    $this->children = new ArrayCollection();
  }

  /**
   * @ORM\Column(type="string")
   * @var string
   */
  protected $name;

  /**
   * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
   * @var ArrayCollection|Produto[]
   */
  protected $products;

  /**
   * @ORM\ManytoOne(targetEntity="Category", inversedBy="children")
   * @ORM\JoinColumn(name="parent_category_id", referencedColumnName="id")
   * @var Category
   */
  protected $parent;

  /**
   * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
   * @var ArrayCollection|Category[]
   */
  protected $children;

  public function getName()
  {
    return $this->name;
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function getProducts()
  {
    return $this->products;
  }

  public function getChildren()
  {
    return $this->children;
  }

  public function getParent()
  {
    return $this->parent;
  }

  public function setParent(Category $parent)
  {
    $this->parent = $parent;
  }

  public function fields()
  {
    return [
      'name',
    ];
  }

}