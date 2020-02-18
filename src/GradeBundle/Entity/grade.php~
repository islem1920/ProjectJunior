<?php

namespace GradeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grade
 *
 * @ORM\Table(name="grade")
 * @ORM\Entity(repositoryClass="GradeBundle\Repository\GradeRepository")
 */
class Grade
{
    /**
     * @var int
     *
     * @ORM\Column(name="idgr", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idgr;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrclasse", type="integer")
     */
    private $nbrclasse;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrenfgr", type="integer")
     */
    private $nbrenfgr;

    /**
     * @var string
     *
     * @ORM\Column(name="nomgr", type="string", length=255)
     */
    private $nomgr;


    /**
     * Get idgr
     *
     * @return int
     */
    public function getIdgr()
    {
        return $this->idgr;
    }

    /**
     * Set nbrclasse
     *
     * @param integer $nbrclasse
     *
     * @return grade
     */
    public function setNbrclasse($nbrclasse)
    {
        $this->nbrclasse = $nbrclasse;

        return $this;
    }

    /**
     * Get nbrclasse
     *
     * @return int
     */
    public function getNbrclasse()
    {
        return $this->nbrclasse;
    }

    /**
     * Set nbrenfgr
     *
     * @param integer $nbrenfgr
     *
     * @return grade
     */
    public function setNbrenfgr($nbrenfgr)
    {
        $this->nbrenfgr = $nbrenfgr;

        return $this;
    }

    /**
     * Get nbrenfgr
     *
     * @return int
     */
    public function getNbrenfgr()
    {
        return $this->nbrenfgr;
    }

    /**
     * Set nomgr
     *
     * @param string $nomgr
     *
     * @return grade
     */
    public function setNomgr($nomgr)
    {
        $this->nomgr = $nomgr;

        return $this;
    }

    /**
     * Get nomgr
     *
     * @return string
     */
    public function getNomgr()
    {
        return $this->nomgr;
    }
}
