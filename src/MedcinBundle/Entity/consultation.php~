<?php

namespace MedcinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 *
 * @ORM\Table(name="consultation")
 * @ORM\Entity(repositoryClass="MedcinBundle\Repository\ConsultationRepository")
 */
class Consultation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_const", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Medcin")
     * @ORM\JoinColumn(name="id_medecin",referencedColumnName="id")
     */
    private $medcin;

    /**
     * @ORM\ManyToOne(targetEntity="Enfant")
     * @ORM\JoinColumn(name="id_enfant",referencedColumnName="id")
     */
    private $enfant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_const", type="date")
     */
    private $dateConst;



    /**
     * Get idConst
     *
     * @return integer
     */
    public function getIdConst()
    {
        return $this->id_const;
    }

    /**
     * Set dateConst
     *
     * @param \DateTime $dateConst
     *
     * @return Consultation
     */
    public function setDateConst($dateConst)
    {
        $this->dateConst = $dateConst;

        return $this;
    }

    /**
     * Get dateConst
     *
     * @return \DateTime
     */
    public function getDateConst()
    {
        return $this->dateConst;
    }

    /**
     * Set medcin
     *
     * @param \MedcinBundle\Entity\Medcin $medcin
     *
     * @return Consultation
     */
    public function setMedcin(\MedcinBundle\Entity\Medcin $medcin = null)
    {
        $this->medcin = $medcin;

        return $this;
    }

    /**
     * Get medcin
     *
     * @return \MedcinBundle\Entity\Medcin
     */
    public function getMedcin()
    {
        return $this->medcin;
    }

    /**
     * Set enfant
     *
     * @param \MedcinBundle\Entity\Enfant $enfant
     *
     * @return Consultation
     */
    public function setEnfant(\MedcinBundle\Entity\Enfant $enfant = null)
    {
        $this->enfant = $enfant;

        return $this;
    }

    /**
     * Get enfant
     *
     * @return \MedcinBundle\Entity\Enfant
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
