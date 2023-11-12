<?php

namespace App\Repository;

use App\Entity\Encoder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Encoder>
 *
 * @method Encoder|null find($id, $lockMode = null, $lockVersion = null)
 * @method Encoder|null findOneBy(array $criteria, array $orderBy = null)
 * @method Encoder[]    findAll()
 * @method Encoder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EncoderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Encoder::class);
    }

//    /**
//     * @return Encoder[] Returns an array of Encoder objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Encoder
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
