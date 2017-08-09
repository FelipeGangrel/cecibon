<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
  public function findAll();
  public function find($id);
  public function create(array $data);
  public function update(array $data, $id);
  public function save($obj);
  public function delete($obj);
}