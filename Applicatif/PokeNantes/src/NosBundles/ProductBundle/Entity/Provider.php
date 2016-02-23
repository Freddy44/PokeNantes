<?php

namespace NosBundles\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provider
 *
 * @ORM\Table(name="provider")
 * @ORM\Entity
 */
class Provider
{
    /**
     * @var string
     *
     * @ORM\Column(name="prov_ref", type="string", length=20, nullable=false)
     */
    private $provRef;

    /**
     * @var string
     *
     * @ORM\Column(name="prov_name", type="string", length=40, nullable=false)
     */
    private $provName;

    /**
     * @var string
     *
     * @ORM\Column(name="prov_type", type="string", length=20, nullable=false)
     */
    private $provType;

    /**
     * @var integer
     *
     * @ORM\Column(name="prov_phone", type="integer", nullable=false)
     */
    private $provPhone;

    /**
     * @var integer
     *
     * @ORM\Column(name="prov_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $provId;

    
}
