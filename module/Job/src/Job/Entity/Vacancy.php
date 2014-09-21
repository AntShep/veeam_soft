<?php
namespace Job\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;

/**
 * Vacancy
 *
 * @ORM\Entity
 * @ORM\Table(name="vacancy")
 */
class Vacancy
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
     * @var string
     * @ORM\Column(type="string", length=1024, nullable=false)
     * @Annotation\Validator({"name":"NotEmpty"})
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(type="string", length=5, nullable=false)
     * @Annotation\Validator({"name":"NotEmpty"})
     */
    protected $lang;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="vacancies")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id", nullable=false)
     * @Annotation\Validator({"name":"NotEmpty"})
     */
    protected $department;

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
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get language.
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set language.
     *
     * @param string $lang
     *
     * @return void
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * Set department.
     *
     * @param string $department
     * @return Vacancy
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department.
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

}