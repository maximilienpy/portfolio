<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
    private $pitch;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkGithub;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkDemo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Techno::class, inversedBy="projects")
     */
    private $technos;

    /**
     * @ORM\ManyToOne(targetEntity=Context::class, inversedBy="projects")
     */
    private $context;

    public function __construct()
    {
        $this->technos = new ArrayCollection();
    }

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

    public function getPitch(): ?string
    {
        return $this->pitch;
    }

    public function setPitch(string $pitch): self
    {
        $this->pitch = $pitch;

        return $this;
    }

    public function getLinkGithub(): ?string
    {
        return $this->linkGithub;
    }

    public function setLinkGithub(string $linkGithub): self
    {
        $this->linkGithub = $linkGithub;

        return $this;
    }

    public function getLinkDemo(): ?string
    {
        return $this->linkDemo;
    }

    public function setLinkDemo(?string $linkDemo): self
    {
        $this->linkDemo = $linkDemo;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    /**
     * @return Collection|Techno[]
     */
    public function getTechnos(): Collection
    {
        return $this->technos;
    }

    public function addTechno(Techno $techno): self
    {
        if (!$this->technos->contains($techno)) {
            $this->technos[] = $techno;
        }

        return $this;
    }

    public function removeTechno(Techno $techno): self
    {
        $this->technos->removeElement($techno);

        return $this;
    }

    public function getContext(): ?Context
    {
        return $this->context;
    }

    public function setContext(?Context $context): self
    {
        $this->context = $context;

        return $this;
    }
}
