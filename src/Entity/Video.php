<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
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
    private ?int $size = null;

    #[ORM\Column(length: 255)]
    private ?string $videoQuality = null;

    #[ORM\OneToMany(mappedBy: 'video', targetEntity: Folder::class)]
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

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getVideoQuality(): ?string
    {
        return $this->videoQuality;
    }

    public function setVideoQuality(string $videoQuality): static
    {
        $this->videoQuality = $videoQuality;

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
            $folder->setVideo($this);
        }

        return $this;
    }

    public function removeFolder(Folder $folder): static
    {
        if ($this->folders->removeElement($folder)) {
            // set the owning side to null (unless already changed)
            if ($folder->getVideo() === $this) {
                $folder->setVideo(null);
            }
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
