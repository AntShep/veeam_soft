<?php
namespace Job\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * Department
 *
 * @ORM\Entity
 * @ORM\Table(name="department")
 */
class Department
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Annotation\Validator({"name":"NotEmpty"})
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Vacancy" , mappedBy="department" , cascade={"all"})
     */
    private $vacancies;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param int $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set vacancies.
     *
     * @param  \Job\Entity\Vacancy $vacancies
     * @return Department
     */
    public function setVacancies(\Job\Entity\Vacancy $vacancies = null)
    {
        $this->vacancies = $vacancies;

        return $this;
    }

    /**
     * Get vacancies.
     *
     * @return \Job\Entity\Vacancy
     */
    public function getFavourites()
    {
        return $this->vacancies;
    }

    /**
     * Add vacancy.
     *
     * @param \Job\Entity\Vacancy $vacancy
     * @return Department
     */
    public function addVacancy(\Job\Entity\Vacancy $vacancy)
    {
        $this->vacancies[] = $vacancy;

        return $this;
    }

    /**
     * Remove vacancy.
     *
     * @param \Job\Entity\Vacancy $vacancies
     */
    public function removeVacancy(\Job\Entity\Vacancy $vacancies)
    {
        $this->vacancies->removeElement($vacancies);
    }

}