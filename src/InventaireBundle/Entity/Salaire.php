<?php

namespace InventaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salaire
 *
 * @ORM\Table(name="salaire")
 * @ORM\Entity(repositoryClass="InventaireBundle\Repository\SalaireRepository")
 */
class Salaire
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
     * @var float
     *
     * @ORM\Column(name="chiffre", type="float")
     */
    private $chiffre;

    /**
     * @var float
     *
     * @ORM\Column(name="prime", type="float")
     */
    private $prime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set chiffre
     *
     * @param float $chiffre
     *
     * @return Salaire
     */
    public function setChiffre($chiffre)
    {
        $this->chiffre = $chiffre;

        return $this;
    }

    /**
     * Get chiffre
     *
     * @return float
     */
    public function getChiffre()
    {
        return $this->chiffre;
    }

    /**
     * Set prime
     *
     * @param float $prime
     *
     * @return Salaire
     */
    public function setPrime($prime)
    {
        $this->prime = $prime;

        return $this;
    }

    /**
     * Get prime
     *
     * @return float
     */
    public function getPrime()
    {
        return $this->prime;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Salaire
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

