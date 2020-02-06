<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PerformanceRepository")
 * @Vich\Uploadable
 */
class Performance
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255,
     *     maxMessage = "Le lien de l'image ne doit pas dépasser {{ limit }} caractères")
     *
     */
    private $image;
    /**
     *
     * @Vich\UploadableField(mapping="pictures", fileNameProperty="image")
     *
     * @var File|null
     * @Assert\File(
     *    maxSize = "500k",
     *    maxSizeMessage = "L'image ne doit pas faire plus de {{ limit }} mega-octets.",
     *    mimeTypes = {"image/gif", "image/jpeg", "image/png", "image/svg+xml", "image/webp"},
     *    mimeTypesMessage = "Format d'image non reconnu. Veuillez choisir une nouvelle image."
     *)
     */
    private $imageFile;

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var DateTimeInterface
     */
    private $updatedAt;
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param File|UploadedFile $imageFile
     * @throws Exception
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
}
