<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\Length(
     *     max = 255,
     *     maxMessage="Le type de prix ne doit pas dépasser {{ limit }} caractères.")
     */
    private $price_type;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Positive(
     *message="La valeur du prix doit-être positive")
     *
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
