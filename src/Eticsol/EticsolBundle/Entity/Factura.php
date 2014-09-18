<?php

namespace Eticsol\EticsolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Factura
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FacturaRepository")
 */
class Factura
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
     * @var string
     *
     * @ORM\Column(name="numeroFactura", type="string", length=255)
     */
    private $numeroFactura;

   /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var \float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

    /**
     *
     * @var \integer
     * @ORM\ManyToOne(targetEntity="Iva")
     * @ORM\JoinColumn(name="iva_id", referencedColumnName="id")
     */
    private $iva;

     /**
     * @var \integer
     * @ORM\ManyToOne(targetEntity="CondicionPago")
     * @ORM\JoinColumn(name="condicionpago_id", referencedColumnName="id")
     */
    private $condicionPago;

      /**
     * @var \integer
     *
     * @ORM\ManyToOne(targetEntity="Localidad")
     * @ORM\JoinColumn(name="localidad_id", referencedColumnName="id")
     */
    private $localidad;
      
      /**
     * 
     * @ORM\oneToMany(targetEntity="Detalle", mappedBy="factura",cascade="all")
     * @ORM\JoinColumn(name="detalle_id", referencedColumnName="id")
     *  
     */
    private  $detalles;

      
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set numeroFactura
     *
     * @param string $numeroFactura
     * @return Factura
     */
    public function setNumeroFactura($numeroFactura)
    {
        $this->numeroFactura = $numeroFactura;

        return $this;
    }

    /**
     * Get numeroFactura
     *
     * @return string 
     */
    public function getNumeroFactura()
    {
        return $this->numeroFactura;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Factura
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Factura
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set iva
     *
     * @param \Eticsol\EticsolBundle\Entity\Iva $iva
     * @return Factura
     */
    public function setIva(\Eticsol\EticsolBundle\Entity\Iva $iva = null)
    {
        $this->iva = $iva;

        return $this;
    }

    /**
     * Get iva
     *
     * @return \Eticsol\EticsolBundle\Entity\Iva 
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * Set condicionPago
     *
     * @param \Eticsol\EticsolBundle\Entity\CondicionPago $condicionPago
     * @return Factura
     */
    public function setCondicionPago(\Eticsol\EticsolBundle\Entity\CondicionPago $condicionPago = null)
    {
        $this->condicionPago = $condicionPago;

        return $this;
    }

    /**
     * Get condicionPago
     *
     * @return \Eticsol\EticsolBundle\Entity\CondicionPago 
     */
    public function getCondicionPago()
    {
        return $this->condicionPago;
    }

    /**
     * Set localidad
     *
     * @param \Eticsol\EticsolBundle\Entity\Localidad $localidad
     * @return Factura
     */
    public function setLocalidad(\Eticsol\EticsolBundle\Entity\Localidad $localidad = null)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return \Eticsol\EticsolBundle\Entity\Localidad 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Add detalles
     *
     * @param \Eticsol\EticsolBundle\Entity\Detalle $detalles
     * @return Factura
     */
    public function addDetalle(\Eticsol\EticsolBundle\Entity\Detalle $detalles)
    {
        $this->detalles[] = $detalles;

        return $this;
    }

    /**
     * Remove detalles
     *
     * @param \Eticsol\EticsolBundle\Entity\Detalle $detalles
     */
    public function removeDetalle(\Eticsol\EticsolBundle\Entity\Detalle $detalles)
    {
        $this->detalles->removeElement($detalles);
    }

    /**
     * Get detalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetalles()
    {
        return $this->detalles;
    }
    
    public function __toString() {
        return $this->getNumeroFactura(); 
}

    }