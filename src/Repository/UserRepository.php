<?php


namespace App\Repository;


use App\Entity\Participant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__consttruct($registry, Participant::class);
    }


    public function findParticipantsBy() {
        return $this->createQueryBuilder('p')
            -> andWhere('p.isActif =1')
            -> getQuery()
            -> getResult();
    }

}