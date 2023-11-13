<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FolderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: FolderRepository::class)]
#[ApiResource]
class Folder
{
    #[Groups('rapport')]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups('rapport')]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Groups('rapport')]
    #[ORM\Column(nullable: true)]
    private ?int $views = null;

    #[Groups('rapport')]
    #[ORM\Column]
    private ?int $uid = null;

    #[ORM\ManyToMany(targetEntity: Video::class, inversedBy: 'folders')]
    private Collection $videos;

    public function __construct()
    {
        $this->videos = new ArrayCollection();
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

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): static
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
        }

        return $this;
    }

    public function removeVideo(Video $video): static
    {
        $this->videos->removeElement($video);

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

    public function getUid(): ?int
    {
        return $this->uid;
    }

    public function setUid(int $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}
