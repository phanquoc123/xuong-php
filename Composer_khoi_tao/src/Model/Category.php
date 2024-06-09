<?php

namespace Quocpa44\ComposerKhoiTao\Model;

use Quocpa44\ComposerKhoiTao\Common\Model;

class Category extends Model
{
   protected string $tableName = 'categories';

   public function paginateCategories($page = 1, $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);
        $totalPage = ceil($this->count() / $perPage);
        $offset = $perPage * ($page - 1);
        $data = $queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('id', 'asc')
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }
}
