<?php

namespace Job\Repository;

use Doctrine\ORM\EntityRepository;
use Job\Model\Languages\LanguageManager;

/**
 * Vacancy repository.
 *
 * Should be used inside vacancy's entity, that needs to be filtered.
 */
class VacancyRepository extends EntityRepository {

    public function getDefaultVacancies()
    {
        $qb = $this->createQueryBuilder('v');
        $qb
            ->select('v, dep, d')
            ->innerJoin('v.department', 'dep')
            ->innerJoin('v.descriptions', 'd')
            ->where('d.lang = :defaultLang')
            ->setParameter('defaultLang', LanguageManager::DEFAULT_LANG);
        return $qb->getQuery()->getScalarResult();
    }

    public function getVacanciesByFilter($dep = null, $lang = null) {
        //TODO: A bad solution. It should be changed to a query.
        $defaultVacancies = $this->getDefaultVacancies();

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
                ->andWhere('d.lang = :lang')
                ->setParameter('lang', $lang);
        }
        $translatedVacancies = $qb->getQuery()->getScalarResult();

        foreach($defaultVacancies as $defVacancy) {
            $isVacancyDetected = false;
            foreach($translatedVacancies as $transVacancy) {
                if($transVacancy['v_id'] == $defVacancy['v_id']) {
                    $isVacancyDetected = true;
                    break;
                }
            }
            if(!$isVacancyDetected && (!$dep || $defVacancy['dep_id'] == $dep)) {
                $translatedVacancies[] = $defVacancy;
            }
        }

        return $translatedVacancies;
    }
}