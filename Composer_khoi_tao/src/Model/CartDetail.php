<?php

namespace Quocpa44\ComposerKhoiTao\Model;

use Quocpa44\ComposerKhoiTao\Common\Model;

class CartDetail extends Model
{
   protected string $tableName = 'cart_details';

   public function deleteByCartID($cartID)
   {
      return $this->queryBuilder
         ->delete($this->tableName)
         ->where('cart_id = ?')
         ->setParameter(0, $cartID)
         ->executeQuery();
   }
}
