<?php
namespace Job\Entity;

use Doctrine\ORM\Mapping as ORM;
use Job\Model\Identifier\IdentifierTrait;

/**
 * Vacancy
 *
 * @ORM\Entity(repositoryClass="Job\Repository\VacancyRepository")
 * @ORM\Table(name="vacancy")
 */
class Vacancy
{
    use IdentifierTrait;

    /**
     * @ORM\OneToMany(targetEntity="Description" , mappedBy="vacancy" , cascade={"remove"})
     */
    protected $descriptions;

    /**
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="vacancies")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $department;

    /**
     * Set descriptions.
     *
     * @param  \Job\Entity\Description $descriptions
     * @return Vacancy
     */
    public function setDescriptions(\Job\Entity\Description $descriptions = null)
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    /**
     * Get descriptions.
     *
     * @return \Job\Entity\Description
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * Add description.
     *
     * @param \Job\Entity\Description $descriptions
     * @return Vacancy
     */
    public function addDescription(\Job\Entity\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;

        return $this;
    }

    /**
     * Remove description.
     *
     * @param \Job\Entity\Description $descriptions
     */
    public function removeVacancy(\Job\Entity\Description $descriptions)
    {
        $this->descriptions->removeElement($descriptions);
    }

    /**
     * Set department.
     *
     * @param  \Job\Entity\Department $department
     * @return Vacancy
     */
    public function setDepartment(\Job\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department.
     *
     * @return \Job\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

}