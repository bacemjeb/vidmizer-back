<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VideoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
#[ApiResource]
class Video
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column]
    private ?float $size = null;

    #[ORM\Column(length: 255)]
    private ?string $quality = null;

    #[ORM\Column(nullable: true)]
    private ?int $views = null;

    #[ORM\ManyToMany(targetEntity: Folder::class, mappedBy: 'videos')]
    private Collection $folders;

    #[ORM\OneToMany(mappedBy: 'video', targetEntity: Encoder::class)]
    private Collection $encoders;

    public function __construct()
    {
        $this->folders = new ArrayCollection();
        $this->encoders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(float $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getQuality(): ?string
    {
        return $this->quality;
    }

    public function setQuality(string $quality): static
    {
        $this->quality = $quality;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(?int $views): static
    {
        $this->views = $views;

        return $this;
    }

    /**
     * @return Collection<int, Folder>
     */
    public function getFolders(): Collection
    {
        return $this->folders;
    }

    public function addFolder(Folder $folder): static
    {
        if (!$this->folders->contains($folder)) {
            $this->folders->add($folder);
            $folder->addVideo($this);
        }

        return $this;
    }

    public function removeFolder(Folder $folder): static
    {
        if ($this->folders->removeElement($folder)) {
            $folder->removeVideo($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Encoder>
     */
    public function getEncoders(): Collection
    {
        return $this->encoders;
    }

    public function addEncoder(Encoder $encoder): static
    {
        if (!$this->encoders->contains($encoder)) {
            $this->encoders->add($encoder);
            $encoder->setVideo($this);
        }

        return $this;
    }

    public function removeEncoder(Encoder $encoder): static
    {
        if ($this->encoders->removeElement($encoder)) {
            // set the owning side to null (unless already changed)
            if ($encoder->getVideo() === $this) {
                $encoder->setVideo(null);
            }
        }

        return $this;
    }
}
