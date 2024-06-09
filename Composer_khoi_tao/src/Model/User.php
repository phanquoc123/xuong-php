<?php

namespace Quocpa44\ComposerKhoiTao\Model;

use Quocpa44\ComposerKhoiTao\Common\Model;

class User extends Model
{
    protected string $tableName = 'users';




    public function findByEmail($email)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();
    }
    public function paginateUser($page = 1, $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);
        $totalPage = ceil($this->count() / $perPage);
        $offset = $perPage * ($page - 1);
        $data = $queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }
}
