<?php
namespace Job\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
use Job\Model\Identifier\IdentifierTrait;

/**
 * Department
 *
 * @ORM\Entity
 * @ORM\Table(name="department", indexes={@ORM\Index(name="name", columns={"name"})})
 */
class Department
{
    use IdentifierTrait;

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
    public function getVacancies()
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