<?php

namespace App\Repository;

use App\Entity\MainEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MainEntity>
 *
 * @method MainEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method MainEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method MainEntity[]    findAll()
 * @method MainEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MainEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MainEntity::class);
    }

    public function save(MainEntity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MainEntity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
      /**
     * @return MainEntity[] Returns an array of MainEntity objects
    */
    public function findByTypeAndSearchString(string $type, string $searchString): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.' . $type . ' LIKE :searchString')
            ->setParameter('searchString', '%' . $searchString . '%')
            ->getQuery()
            ->getResult();
    }


}
