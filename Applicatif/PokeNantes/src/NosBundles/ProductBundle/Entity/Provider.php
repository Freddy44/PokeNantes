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
    protected  $provRef;

    /**
     * @var string
     *
     * @ORM\Column(name="prov_name", type="string", length=40, nullable=false)
     */
    protected $provName;

    /**
     * @var string
     *
     * @ORM\Column(name="prov_type", type="string", length=20, nullable=false)
     */
    protected $provType;

    /**
     * @var integer
     *
     * @ORM\Column(name="prov_phone", type="integer", nullable=false)
     */
    protected $provPhone;

    /**
     * @var integer
     *
     * @ORM\Column(name="prov_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $provId;
	
	/**
	 *
	 * @return the string
	 */
	
    /**
     * Bidirectional
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="ProvidersList")
     */
    protected $ProductsList;
	
    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->ProductsList = new \Doctrine\Common\Collections\ArrayCollection();
    }
	
	public function getProvRef() {
		return $this->provRef;
	}
	
	/**
	 *
	 * @param
	 *        	$provRef
	 */
	public function setProvRef($provRef) {
		$this->provRef = $provRef;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getProvName() {
		return $this->provName;
	}
	
	/**
	 *
	 * @param
	 *        	$provName
	 */
	public function setProvName($provName) {
		$this->provName = $provName;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getProvType() {
		return $this->provType;
	}
	
	/**
	 *
	 * @param
	 *        	$provType
	 */
	public function setProvType($provType) {
		$this->provType = $provType;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getProvPhone() {
		return $this->provPhone;
	}
	
	/**
	 *
	 * @param
	 *        	$provPhone
	 */
	public function setProvPhone($provPhone) {
		$this->provPhone = $provPhone;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getProvId() {
		return $this->provId;
	}
	
	/**
	 *
	 * @param
	 *        	$provId
	 */
	public function setProvId($provId) {
		$this->provId = $provId;
		return $this;
	}
	

    

    /**
     * Add ProductsList
     *
     * @param \NosBundles\ProductBundle\Entity\Product $productsList
     * @return Provider
     */
    public function addProductsList(\NosBundles\ProductBundle\Entity\Product $productsList)
    {
        $this->ProductsList[] = $productsList;

        return $this;
    }

    /**
     * Remove ProductsList
     *
     * @param \NosBundles\ProductBundle\Entity\Product $productsList
     */
    public function removeProductsList(\NosBundles\ProductBundle\Entity\Product $productsList)
    {
        $this->ProductsList->removeElement($productsList);
    }

    /**
     * Get ProductsList
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductsList()
    {
        return $this->ProductsList;
    }
}
