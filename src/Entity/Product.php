<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taxcode;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Taxcode", inversedBy="value")
     */
    private $TaxCode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InvoiceProduct", mappedBy="product_id")
     */
    private $product_id;

    public function __construct()
    {
        $this->product_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTaxcode(): ?string
    {
        return $this->taxcode;
    }

    public function setTaxcode(string $taxcode): self
    {
        $this->taxcode = $taxcode;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCode(): ?float
    {
        return $this->code;
    }

    public function setCode(float $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|InvoiceProduct[]
     */
    public function getProductId(): Collection
    {
        return $this->product_id;
    }

    public function addProductId(InvoiceProduct $productId): self
    {
        if (!$this->product_id->contains($productId)) {
            $this->product_id[] = $productId;
            $productId->setProductId($this);
        }

        return $this;
    }

    public function removeProductId(InvoiceProduct $productId): self
    {
        if ($this->product_id->contains($productId)) {
            $this->product_id->removeElement($productId);
            // set the owning side to null (unless already changed)
            if ($productId->getProductId() === $this) {
                $productId->setProductId(null);
            }
        }

        return $this;
    }
}
