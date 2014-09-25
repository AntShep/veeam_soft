<?php

namespace Job\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Job\Model\Languages\LanguageManager;

class JobController extends AbstractActionController
{
    public function indexAction()
    {
        $request = $this->getRequest();

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $departments = $objectManager
            ->getRepository('Job\Entity\Department')
            ->findAll();
        $vacancyRepository = $objectManager->getRepository('Job\Entity\Vacancy');

        if ($request->isPost()) {
            $post_data = $request->getPost();
            $select_lang = $post_data['lang_filter'];
            $select_dep = $post_data['dep_filter'];
            $vacancies = $vacancyRepository->getVacanciesByFilter($select_dep, $select_lang);
        }
        else {
            $vacancies = $vacancyRepository->getDefaultVacancies();
        }

        $view = new ViewModel(array(
            'vacancies' => $vacancies,
            'languages' => LanguageManager::getAll(),
            'departments' => $departments,
            'select_lang' => isset($select_lang) ? $select_lang : LanguageManager::DEFAULT_LANG,
            'select_dep' => isset($select_dep) ? $select_dep : null,
        ));
        return $view;
    }
}
