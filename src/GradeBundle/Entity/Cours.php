<?php

namespace GradeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="GradeBundle\Repository\CoursRepository")
 */
class Cours
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomcours", type="string", length=255)
     */
    private $nomcours;

    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="string", length=255)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="listeens", type="string", length=255)
     */
    private $listeens;

    /**
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="idcl",referencedColumnName="idcl")
     */
    private $classe;



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
     * Set nomcours.
     *
     * @param string $nomcours
     *
     * @return Cours
     */
    public function setNomcours($nomcours)
    {
        $this->nomcours = $nomcours;

        return $this;
    }

    /**
     * Get nomcours.
     *
     * @return string
     */
    public function getNomcours()
    {
        return $this->nomcours;
    }

    /**
     * Set duree.
     *
     * @param string $duree
     *
     * @return Cours
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree.
     *
     * @return string
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set listeens.
     *
     * @param string $listeens
     *
     * @return Cours
     */
    public function setListeens($listeens)
    {
        $this->listeens = $listeens;

        return $this;
    }

    /**
     * Get listeens.
     *
     * @return string
     */
    public function getListeens()
    {
        return $this->listeens;
    }

    /**
     * Set classe.
     *
     * @param \GradeBundle\Entity\Classe|null $classe
     *
     * @return Cours
     */
    public function setClasse(\GradeBundle\Entity\Classe $classe = null)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe.
     *
     * @return \GradeBundle\Entity\Classe|null
     */
    public function getClasse()
    {
        return $this->classe;
    }


}
