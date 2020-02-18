<?php

namespace GradeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="Classe")
 * @ORM\Entity(repositoryClass="GradeBundle\Repository\ClasseRepository")
 */
class Classe
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcl", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idcl;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrenfcl", type="integer")
     */
    private $nbrenfcl;

    /**
     * @ORM\ManyToOne(targetEntity="Grade")
     * @ORM\JoinColumn(name="idgr",referencedColumnName="idgr")
     */
    private $grade;


    /**
     * Get idcl
     *
     * @return int
     */
    public function getIdcl()
    {
        return $this->idcl;
    }

    /**
     * Set nbrenfcl
     *
     * @param integer $nbrenfcl
     *
     * @return classe
     */
    public function setNbrenfcl($nbrenfcl)
    {
        $this->nbrenfcl = $nbrenfcl;

        return $this;
    }

    /**
     * Get nbrenfcl
     *
     * @return int
     */
    public function getNbrenfcl()
    {
        return $this->nbrenfcl;
    }

    /**
     * Set grade
     *
     * @param \GradeBundle\Entity\Grade $grade
     *
     * @return classe
     */
    public function setGrade(\GradeBundle\Entity\Grade $grade = null)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return \GradeBundle\Entity\Grade
     */
    public function getGrade()
    {
        return $this->grade;
    }
}
