<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaxcodeRepository")
 */
class Taxcode
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
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\product", mappedBy="TaxCode")
     */
    private $value;

    public function __construct()
    {
        $this->value = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection|product[]
     */
    public function getValue(): Collection
    {
        return $this->value;
    }

    public function addValue(product $value): self
    {
        if (!$this->value->contains($value)) {
            $this->value[] = $value;
            $value->setTaxCode($this);
        }

        return $this;
    }

    public function removeValue(product $value): self
    {
        if ($this->value->contains($value)) {
            $this->value->removeElement($value);
            // set the owning side to null (unless already changed)
            if ($value->getTaxCode() === $this) {
                $value->setTaxCode(null);
            }
        }

        return $this;
    }
}
