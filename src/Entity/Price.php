<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PriceRepository")
 */
class Price
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
    private $price_type;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPriceType(): ?string
    {
        return $this->price_type;
    }

    public function setPriceType(string $price_type): self
    {
        $this->price_type = $price_type;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
}
