<?php

namespace Quocpa44\ComposerKhoiTao\Model;

use Quocpa44\ComposerKhoiTao\Common\Model;


class Cart extends Model
{
   protected string $tableName = 'carts';

   public function findByUserID($userID)
   {
      return $this->queryBuilder
         ->select('*')
         ->from($this->tableName)
         ->where('user_id = ?')->setParameter(0, $userID)
         ->fetchAssociative();
   }
}
