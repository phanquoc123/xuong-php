<?php

namespace Quocpa44\ComposerKhoiTao\Model;

use Quocpa44\ComposerKhoiTao\Common\Model;

class CartDetail extends Model
{
   protected string $tableName = 'cart_details';

   public function findByCartIDAndProductID($cartID, $productID)
   {
      return $this->queryBuilder
         ->select('*')
         ->from($this->tableName)

         ->where('cart_id = ?')->setParameter(0, $cartID)
         ->andWhere('product_id = ?')->setParameter(1, $productID)

         ->fetchAssociative();
   }

   public function deleteByCartID($cartID)
   {
      return $this->queryBuilder
         ->delete($this->tableName)
         ->where('cart_id = ?')
         ->setParameter(0, $cartID)
         ->executeQuery();
   }

   public function deleteByCartIDAndProductID($cartID, $productID)
   {
      return $this->queryBuilder
         ->delete($this->tableName)

         ->where('cart_id = ?')->setParameter(0, $cartID)
         ->andWhere('product_id = ?')->setParameter(1, $productID)

         ->executeQuery();
   }

   public function updateByCartIDAndProductID($cartID, $productID, $quantity)
   {
      $query = $this->queryBuilder->update($this->tableName);

      $query
         ->set('quantity', '?')->setParameter(0, $quantity)
         ->where('cart_id = ?')->setParameter(1, $cartID)
         ->andWhere('product_id = ?')->setParameter(2, $productID)

         ->executeQuery();
   }
}
