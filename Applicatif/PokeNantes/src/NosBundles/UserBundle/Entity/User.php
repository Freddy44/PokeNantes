<?php

namespace NosBundles\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="NosBundles\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_firstname", type="string", length=255)
     */
    private $usrFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_lastname", type="string", length=255)
     */
    private $usrLastname;

    /**
     * __construct
     *
     * @return
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Get Parent
     *
     * @return FOSUserBundle
     */
    public function getParent()
    {
        return 'FOSUserBundle';
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

    /**
     * Set usrFirstname
     *
     * @param string $usrFirstname
     * @return User
     */
    public function setUsrFirstname($usrFirstname)
    {
        $this->usrFirstname = $usrFirstname;

        return $this;
    }

    /**
     * Get usrFirstname
     *
     * @return string
     */
    public function getUsrFirstname()
    {
        return $this->usrFirstname;
    }

    /**
     * Set usrLastname
     *
     * @param string $usrLastname
     * @return User
     */
    public function setUsrLastname($usrLastname)
    {
        $this->usrLastname = $usrLastname;

        return $this;
    }

    /**
     * Get usrLastname
     *
     * @return string
     */
    public function getUsrLastname()
    {
        return $this->usrLastname;
    }
}
