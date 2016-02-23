<?php

namespace NosBundles\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
{
    /**
     * @var string
     *
     * @ORM\Column(name="prod_ref", type="string", length=250, nullable=false)
     */
    protected $prodRef;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_name", type="string", length=250, nullable=false)
     */
    protected $prodName;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_cat", type="string", length=250, nullable=false)
     */
    protected $prodCat;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_desc", type="string", length=250, nullable=false)
     */
    protected $prodDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_state", type="string", length=15, nullable=false)
     */
    protected $prodState;

    /**
     * @var string
     *
     * @ORM\Column(name="prod_picture", type="string", length=250, nullable=false)
     */
    protected $prodPicture;

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_qty", type="integer", nullable=false)
     */
    protected $prodQty;

    /**
     * @var integer
     *
     * @ORM\Column(name="prod_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $prodId;
	
	/**
	 *
	 * @return the string
	 */
	public function getProdRef() {
		return $this->prodRef;
	}
	
	/**
	 *
	 * @param
	 *        	$prodRef
	 */
	public function setProdRef($prodRef) {
		$this->prodRef = $prodRef;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getProdName() {
		return $this->prodName;
	}
	
	/**
	 *
	 * @param
	 *        	$prodName
	 */
	public function setProdName($prodName) {
		$this->prodName = $prodName;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getProdCat() {
		return $this->prodCat;
	}
	
	/**
	 *
	 * @param
	 *        	$prodCat
	 */
	public function setProdCat($prodCat) {
		$this->prodCat = $prodCat;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getProdDesc() {
		return $this->prodDesc;
	}
	
	/**
	 *
	 * @param
	 *        	$prodDesc
	 */
	public function setProdDesc($prodDesc) {
		$this->prodDesc = $prodDesc;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getProdState() {
		return $this->prodState;
	}
	
	/**
	 *
	 * @param
	 *        	$prodState
	 */
	public function setProdState($prodState) {
		$this->prodState = $prodState;
		return $this;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getProdPicture() {
		return $this->prodPicture;
	}
	
	/**
	 *
	 * @param
	 *        	$prodPicture
	 */
	public function setProdPicture($prodPicture) {
		$this->prodPicture = $prodPicture;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getProdQty() {
		return $this->prodQty;
	}
	
	/**
	 *
	 * @param
	 *        	$prodQty
	 */
	public function setProdQty($prodQty) {
		$this->prodQty = $prodQty;
		return $this;
	}
	
	/**
	 *
	 * @return the integer
	 */
	public function getProdId() {
		return $this->prodId;
	}
	
	/**
	 *
	 * @param
	 *        	$prodId
	 */
	public function setProdId($prodId) {
		$this->prodId = $prodId;
		return $this;
	}
	


}
