<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProgectRepository")
 */
class Progect
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Developer", inversedBy="progects")
     */
    private $developer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    public function __construct()
    {
        $this->developer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Developer[]
     */
    public function getDeveloper(): Collection
    {
        return $this->developer;
    }

    public function addDeveloper(Developer $developer): self
    {
        if (!$this->developer->contains($developer)) {
            $this->developer[] = $developer;
        }

        return $this;
    }

    public function removeDeveloper(Developer $developer): self
    {
        if ($this->developer->contains($developer)) {
            $this->developer->removeElement($developer);
        }

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }
}
