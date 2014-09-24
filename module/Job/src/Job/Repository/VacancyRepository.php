<?php

namespace Job\Repository;

use Doctrine\ORM\EntityRepository;

class VacancyRepository extends EntityRepository {

    public function getAllVacancies()
    {
        $qb = $this->createQueryBuilder('v');
        $qb
            ->select('v, dep, d')
            ->innerJoin('v.department', 'dep')
            ->innerJoin('v.descriptions', 'd');
        return $qb->getQuery()->getScalarResult();
    }

    public function getVacanciesByFilter($dep = null, $lang = null, $defaultLang = 'en') {
        $qb = $this->createQueryBuilder('v');
        $qb
            ->select('v, dep, d')
            ->innerJoin('v.department', 'dep')
            ->innerJoin('v.descriptions', 'd');
        if($dep) {
            $qb
                ->where('dep.id = :depId')
                ->setParameter('depId', $dep);
        }
        if($lang) {
            $qb
                ->addSelect('CASE WHEN d.lang = :lang THEN 0
                             WHEN d.lang = :defaultLang THEN 1 ELSE 2
                             END as HIDDEN langOrder')
//                ->andWhere('')
                ->setParameter('lang', $lang)
                ->setParameter('defaultLang', $defaultLang)
                ->orderBy('langOrder');
//                ->groupBy('d.vacancy');
        }

        return $qb->getQuery()->getScalarResult();
    }

}