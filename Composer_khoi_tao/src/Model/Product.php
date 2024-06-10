<?php

namespace Quocpa44\ComposerKhoiTao\Model;

use Quocpa44\ComposerKhoiTao\Common\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function getAll()
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.price_regular',
                'p.price_sale',
                'p.img_thumbnail',
                'p.created_at',
                'p.updated_at',
                'p.overview',
                'p.content',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->orderBy('p.id', 'desc')
            ->fetchAllAssociative();
    }

    public function search($keyword, $category)
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.price_regular',
                'p.price_sale',
                'p.img_thumbnail',
                'p.created_at',
                'p.updated_at',
                'p.overview',
                'p.content',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->where('p.name LIKE :keyword Or p.category_id = :category')
            ->setParameter('keyword', '%' . $keyword . '%')
            ->setParameter('category', $category)
            ->fetchAllAssociative();
    }

    public function paginateAdmin($page = 1, $perPage = 5, $desc = 'desc')
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);
        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.price_regular',
                'p.price_sale',
                'p.img_thumbnail',
                'p.created_at',
                'p.updated_at',
                'p.overview',
                'p.content',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('p.id', $desc)
            ->fetchAllAssociative();


        return [$data, $totalPage];
    }
    public function paginateDashboard($page = 1, $perPage = 4)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);
        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.price_regular',
                'p.img_thumbnail',
                'p.created_at',
                'p.updated_at',
                'p.overview',
                'p.content',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('p.id', 'desc')
            ->fetchAllAssociative();


        return [$data, $totalPage];
    }
    public function paginateShop($page = 1, $perPage = 8)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);
        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.img_thumbnail',
                'p.price_regular',
                'p.price_sale',
                'p.created_at',
                'p.updated_at',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('p.id', 'desc')
            ->fetchAllAssociative();


        return [$data, $totalPage];
    }

    public function findByID($id)
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.price_regular',
                'p.price_sale',
                'p.img_thumbnail',
                'p.created_at',
                'p.updated_at',
                'p.overview',
                'p.content',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->where('p.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function productByCategory($category)
    {
        // return $this->queryBuilder
        //     ->select('*')
        //     ->from($this->tableName)
            
        //     ->where('category_id = ?')
        //     ->setParameter('category_id', $id)
           
        //     ->fetchAssociative();

        return $this->queryBuilder
        ->select(
            'p.id',
            'p.category_id',
            'p.name',
            'p.price_regular',
            'p.price_sale',
            'p.img_thumbnail',
            'p.created_at',
            'p.updated_at',
            'p.overview',
            'p.content',
            'c.name as c_name'
        )
        ->from($this->tableName, 'p')
        ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
        ->where(' p.category_id = :category')
       
        ->setParameter('category', $category)
        ->fetchAllAssociative();
    }

    public function findByIDcate($id)
{
    $query = $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('id = :id')
        ->setParameter('id', $id);

   

    return $query->fetchAssociative();
}

public function productByCategoryID($id, $category_id)
{
        $query = $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('id != :id')
        ->andWhere('category_id = :category_id')
        ->setParameter('id', $id)
        ->setParameter('category_id', $category_id);
    
   
 

    return $query->fetchAllAssociative();
}
}
