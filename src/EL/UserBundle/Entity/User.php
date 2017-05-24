<?php

namespace EL\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="EL\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="EL\AppBundle\Entity\Biere", cascade={"persist"})
     * nullable=true
     */
    private $biereFavorite;

    
    /**
     * Set biereFavorite
     *
     * @param \EL\AppBundle\Entity\Biere $biereFavorite
     *
     * @return User
     */
    public function setBiereFavorite(\EL\AppBundle\Entity\Biere $biereFavorite = null)
    {
        $this->biereFavorite = $biereFavorite;

        return $this;
    }

    /**
     * Get biereFavorite
     *
     * @return \EL\AppBundle\Entity\Biere
     */
    public function getBiereFavorite()
    {
        return $this->biereFavorite;
    }
}
