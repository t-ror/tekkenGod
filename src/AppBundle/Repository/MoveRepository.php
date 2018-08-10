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
    public function getPunishes(Move $move, $charId, $launcher){
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('m')
            ->from('AppBundle:Character\Move','m')
            ->where('(m.startUpFrame + :move) <= 0')
            ->andWhere('m.character = :character');
        if ($launcher==true){
            $qb->andWhere('m.launcher = 1');
        }
        $qb->setParameters(['move'=> $move->getBlockFrame(),'character'=>$charId]);

        return $qb->getQuery()
            ->getResult();
    }
}