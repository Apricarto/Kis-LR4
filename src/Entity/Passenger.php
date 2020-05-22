<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PassengerRepository")
 */
class Passenger
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amountOfAdults;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amountOfChildren;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amountOfBabies;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $ticketType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmountOfAdults(): ?int
    {
        return $this->amountOfAdults;
    }

    public function setAmountOfAdults(?int $amountOfAdults): self
    {
        $this->amountOfAdults = $amountOfAdults;

        return $this;
    }

    public function getAmountOfChildren(): ?int
    {
        return $this->amountOfChildren;
    }

    public function setAmountOfChildren(?int $amountOfChildren): self
    {
        $this->amountOfChildren = $amountOfChildren;

        return $this;
    }

    public function getAmountOfBabies(): ?int
    {
        return $this->amountOfBabies;
    }

    public function setAmountOfBabies(?int $amountOfBabies): self
    {
        $this->amountOfBabies = $amountOfBabies;

        return $this;
    }

    public function getTicketType(): ?string
    {
        return $this->ticketType;
    }

    public function setTicketType(?string $ticketType): self
    {
        $this->ticketType = $ticketType;

        return $this;
    }
}
