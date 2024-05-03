<?php

namespace App\Entity;

use ApiPlatform\Metadata as APM;
use App\ApiResource\Dto\Foo\Update;
use App\ApiResource\State\Foo\UpdateProcessor;
use App\Repository\FooRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FooRepository::class)]
#[APM\Get]
#[APM\GetCollection]
#[APM\Delete]
#[APM\Patch(
    security: 'object.isEditable()',
    input: Update::class,
    output: false,
    processor: UpdateProcessor::class
)]
#[APM\Post]
#[APM\Put(
    security: 'object.isEditable()',
    input: Update::class,
    output: false,
    processor: UpdateProcessor::class
)]
class Foo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $editable = null;

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

    public function isEditable(): ?bool
    {
        return $this->editable;
    }

    public function setEditable(bool $editable): static
    {
        $this->editable = $editable;

        return $this;
    }
}
