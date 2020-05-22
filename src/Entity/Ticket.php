<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\City", inversedBy="files")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departureCity;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\City", inversedBy="files")
     * @ORM\JoinColumn(nullable=true)
     */
    private $arrivalCity;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $departureDate;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $arrivalDate;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Passenger", inversedBy="files")
     * @ORM\JoinColumn(nullable=false)
     */
    private $passenger;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartureCity(): ?City
    {
        return $this->departureCity;
    }

    public function setDepartureCity(?City $departureCity): self
    {
        $this->departureCity = $departureCity;

        return $this;
    }

    public function getArrivalCity(): ?City
    {
        return $this->arrivalCity;
    }

    public function setArrivalCity(?City $arrivalCity): self
    {
        $this->arrivalCity = $arrivalCity;

        return $this;
    }

    public function getDepartureDate(): ?string
    {
        return $this->departureDate;
    }

    public function setDepartureDate(?string $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getArrivalDate(): ?string
    {
        return $this->arrivalDate;
    }

    public function setArrivalDate(?string $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    public function getPassenger(): ?Passenger
    {
        return $this->passenger;
    }

    public function setPassenger(?Passenger $passenger): self
    {
        $this->passenger = $passenger;

        return $this;
    }
}
