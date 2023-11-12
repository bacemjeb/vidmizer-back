<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EncoderRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EncoderRepository::class)]
#[ApiResource]
class Encoder
{
    #[Groups('rapport')]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups('rapport')]
    #[ORM\Column]
    private ?float $size = null;

    #[Groups('rapport')]
    #[ORM\Column(length: 255)]
    private ?string $quality = null;

    #[ORM\ManyToOne(inversedBy: 'encoders')]
    private ?Video $video = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function setVideo(?Video $video): static
    {
        $this->video = $video;

        return $this;
    }
}
