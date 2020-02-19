<?php

namespace MedcinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DossierMedical
 *
 * @ORM\Table(name="dossier_medical")
 * @ORM\Entity(repositoryClass="MedcinBundle\Repository\DossierMedicalRepository")
 */
class DossierMedical
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_dossier", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id_dossier
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get idDossier
     *
     * @return integer
     */
    public function getIdDossier()
    {
        return $this->id;
    }
}
