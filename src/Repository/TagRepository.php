<?php


namespace App\Repository;

use App\Entity\Tag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tag::class);
    }

    public function add(Tag $tag): void
    {
        $this->_em->persist($tag);
    }

    public function save(Tag $tag): void
    {
        $this->_em->persist($tag);
        $this->_em->flush($tag);
    }

}