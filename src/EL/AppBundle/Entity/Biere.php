<?php

namespace EL\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Biere
 *
 * @ORM\Table(name="biere")
 * @ORM\Entity(repositoryClass="EL\AppBundle\Repository\BiereRepository")
 */
class Biere
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     *
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     * unique=true
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="degre", type="decimal", precision=10, scale=0)
     */
    private $degre;


    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Biere
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Biere
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set degre
     *
     * @param string $degre
     *
     * @return Biere
     */
    public function setDegre($degre)
    {
        $this->degre = $degre;

        return $this;
    }

    /**
     * Get degre
     *
     * @return string
     */
    public function getDegre()
    {
        return $this->degre;
    }
}
