<?php

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Util\Inflector;

class DoctrineBaseRepository extends EntityRepository
{

  public function create(array $data)
  { 
    $entity = new $this->_entityName();    
    return $this->prepare($entity, $data);
  }

  public function prepare($entity, array $data)
  { 
    
    $set = 'set';
    $fields = $entity->fields();

    foreach($fields as $field){
      if(isset($data[$field])){

        if($field === 'password'){
          $entity->setPassword(bcrypt($data[$field]));
        }else{
          $setter = $set.Inflector::classify($field); // retorna setName, setPassword, etc
          $entity->$setter($data[$field]);
        }

      }
    }

    return $entity;
  }

  public function prepareToJson(array $objects, array $fields)
  {
      $get = 'get';
      $result = [];
      foreach($objects as $object){
          
          $member = [];
          foreach($fields as $field){
              $getter = $get.Inflector::classify($field);
              $member[$field] = $object->$getter();
          }
          $result[] = $member;
          
          
      }

      return $result;
  }

  public function update(array $data, $id)
  {
    $entity = $this->find($id);
    return $this->prepare($entity, $data);
  }

  public function save($obj)
  { 
    $this->_em->persist($obj);
    $this->_em->flush($obj);
    return $obj;
  }

  public function delete($obj)
  {
    $this->_em->remove($obj);
    $this->_em->flush($obj);
    return true;
  }

}