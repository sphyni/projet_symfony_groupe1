<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Sortie;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieRepository extends ServiceEntityRepository
{
    /**
     * SortieRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }


    /**
     *
     * @return array
     */
    public function findSearch($search, User $userInSession): array
    {
        $query = $this
            ->createQueryBuilder('n')
            ->select('s','p','n')
            ->join('n.site','s')
            ->join('n.participants','p')
        ;


        if (!empty($search->r)) {
            $query=$query
                ->andWhere('n.nom LIKE :r')
                ->setParameter('r',"%{$search->r}%");

        }

       if (!empty($search->site)){
            $query = $query
                ->andWhere('s.id IN (:site)')
                ->setParameter('site', $search->site);
        }
        if (!empty($search->notParticipant )){
            $query = $query
                ->andWhere(':p MEMBER OF n.participants')
                ->setParameter('p', $userInSession);
        }

        return $query->getQuery()->getResult();
    }


    // /**
    //  * @return Sortie[] Returns an array of Sortie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sortie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
