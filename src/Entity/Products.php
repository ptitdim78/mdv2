<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
//use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 * @Vich\Uploadable
 */
class Products
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $online;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max="40", maxMessage="Ce champs ne peut depasser 40 caractères")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(max="300", maxMessage="Ce champs ne peut depasser 300 caractères")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="10", maxMessage="Ce champs ne peut depasser 10 caractères")
     */
    private $longueur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="10", maxMessage="Ce champs ne peut depasser 10 caractères")
     */
    private $hauteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="10", maxMessage="Ce champs ne peut depasser 10 caractères")
     */
    private $profondeur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max="10", maxMessage="Ce champs ne peut depasser 10 caractères")
     */
    private $poids;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(max="80", maxMessage="Ce champs ne peut depasser 80 caractères")
     */
    private $composition;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $updateAt;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien;



    public function getId(): ?int
    {
        return $this->id;
    }

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

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(bool $online): self
    {
        $this->online = $online;

        return $this;
    }

    public function getLongueur(): ?string
    {
        return $this->longueur;
    }

    public function setLongueur(?string $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getHauteur(): ?string
    {
        return $this->hauteur;
    }

    public function setHauteur(?string $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getProfondeur(): ?string
    {
        return $this->profondeur;
    }

    public function setProfondeur(?string $profondeur): self
    {
        $this->profondeur = $profondeur;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(?string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(?string $composition): self
    {
        $this->composition = $composition;

        return $this;
    }

    public function getUpdateAt(): ?DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

        public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updateAt = new DateTime('now');
        }
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

}
