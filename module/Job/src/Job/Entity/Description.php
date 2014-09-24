<?php
namespace Job\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
use Job\Model\Identifier\IdentifierTrait;

/**
 * Description
 *
 * @ORM\Entity
 * @ORM\Table(
 * name="description",
 * indexes={@ORM\Index(name="lang", columns={"lang"})},
 * uniqueConstraints={@ORM\UniqueConstraint(name="description_unique", columns={"vacancy_id", "lang"})}
 * )
 */
class Description
{
    use IdentifierTrait;

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
    protected $details;

    /**
     * @var string
     * @ORM\Column(type="string", length=5, nullable=false)
     * @Annotation\Validator({"name":"NotEmpty"})
     */
    protected $lang;

    /**
     * @ORM\ManyToOne(targetEntity="Vacancy", inversedBy="descriptions")
     * @ORM\JoinColumn(name="vacancy_id", referencedColumnName="id", nullable=false)
     */
    protected $vacancy;

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
     * Get details.
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set details.
     *
     * @param string $details
     *
     * @return void
     */
    public function setDetails($details)
    {
        $this->details = $details;
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
     * Set vacancy.
     *
     * @param \Job\Entity\Vacancy $vacancy
     * @return Description
     */
    public function setDepartment(\Job\Entity\Vacancy $vacancy = null)
    {
        $this->vacancy = $vacancy;

        return $this;
    }

    /**
     * Get vacancy.
     *
     * @return \Job\Entity\Vacancy
     */
    public function getDepartment()
    {
        return $this->vacancy;
    }

}