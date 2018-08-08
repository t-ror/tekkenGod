<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 23.7.18
 * Time: 10:49
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Character\Move;
use Doctrine\ORM\EntityRepository;

class MoveRepository extends EntityRepository
{
    public function getPunishes(Move $move, $charId){
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('m')
            ->from('AppBundle:Character\Move','m')
            ->where('(m.startUpFrame - :move) >= 0')
            ->andWhere('m.character = :character')
            ->setParameters(['move'=> $move->getBlockFrame(),'character'=>$charId])
            ->getQuery()
            ->getResult();

        return $qb;
    }
}