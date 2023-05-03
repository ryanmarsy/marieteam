<?php

namespace App\Repository;

use App\Entity\Liaison;
use App\Entity\Traversee;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Traversee>
 *
 * @method Traversee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Traversee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Traversee[]    findAll()
 * @method Traversee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraverseeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Traversee::class);
    }

    public function save(Traversee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Traversee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByLiaisonAndDateDepart(\DateTimeInterface $dateDepart, int $id): array
    {
        $qb = $this->createQueryBuilder('t');

        return $qb
            ->andWhere($qb->expr()->eq('t.liaison', ':liaison'))
            ->andWhere($qb->expr()->eq('t.dateDepart', ':dateDepart'))
            ->setParameter('liaison', $id)
            ->setParameter('dateDepart', $dateDepart)
            ->getQuery()
            ->getResult();
    }
}
