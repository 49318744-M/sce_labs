<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
#[ORM\Table(name: 'cars')]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(targetEntity: Brand::class, inversedBy: 'cars')]
    #[ORM\JoinColumn(nullable: false, name: 'brand_id')]
    private ?Brand $brand = null;

    public function getId(): ?int { return $this->id; }

    public function getName(): ?string { return $this->name; }

    public function setName(string $name): self { $this->name = $name; return $this; }

    public function getBrand(): ?Brand { return $this->brand; }

    public function setBrand(?Brand $brand): self { $this->brand = $brand; return $this; }
}
