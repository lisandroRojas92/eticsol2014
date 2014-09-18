<?php

namespace Eticsol\EticsolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detalle
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Detalle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;
 
      /**
     *  
     * @ORM\ManyToOne(targetEntity="Factura",inversedBy="detalles",cascade="all")
     * @ORM\JoinColumn(name="factura_id", referencedColumnName="id")
     */
    protected $factura;

    /**
     * @var integer
     * 
     * 
     * @ORM\ManyToOne(targetEntity="Producto", cascade="persist")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     * 
     */
    private $producto;
    
    
    

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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Detalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set factura
     *
     * @param \Eticsol\EticsolBundle\Entity\Factura $factura
     * @return Detalle
     */
    public function setFactura(\Eticsol\EticsolBundle\Entity\Factura $factura = null)
    {
        $this->factura = $factura;

        return $this;
    }

    /**
     * Get factura
     *
     * @return \Eticsol\EticsolBundle\Entity\Factura 
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * Set producto
     *
     * @param \Eticsol\EticsolBundle\Entity\Producto $producto
     * @return Detalle
     */
    public function setProducto(\Eticsol\EticsolBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \Eticsol\EticsolBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }
  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->producto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add producto
     *
     * @param \Eticsol\EticsolBundle\Entity\Producto $producto
     * @return Detalle
     */
    public function addProducto(\Eticsol\EticsolBundle\Entity\Producto $producto)
    {
        $this->producto[] = $producto;

        return $this;
    }

    /**
     * Remove producto
     *
     * @param \Eticsol\EticsolBundle\Entity\Producto $producto
     */
    public function removeProducto(\Eticsol\EticsolBundle\Entity\Producto $producto)
    {
        $this->producto->removeElement($producto);
    }
}
