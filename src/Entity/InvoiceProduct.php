<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InvoiceProductRepository")
 */
class InvoiceProduct
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Invoice")
     */
    private $invoice_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\product", inversedBy="product_id")
     */
    private $product_id;

    /**
     * @ORM\Column(type="float")
     */
    private $Amount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceId(): ?invoice
    {
        return $this->invoice_id;
    }

    public function setInvoiceId(?invoice $invoice_id): self
    {
        $this->invoice_id = $invoice_id;

        return $this;
    }

    public function getProductId(): ?product
    {
        return $this->product_id;
    }

    public function setProductId(?product $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->Amount;
    }

    public function setAmount(float $Amount): self
    {
        $this->Amount = $Amount;

        return $this;
    }
}
