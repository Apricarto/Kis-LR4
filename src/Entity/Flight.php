<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FlightRepository")
 */
class Flight
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
     * @ORM\Column(type="integer", nullable=false)
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $priceWithBaggage;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $baggage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $refound;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartureCity(): ?City
    {
        return $this->departureCity;
    }

    public function getArrivalCity(): ?City
    {
        return $this->arrivalCity;
    }

    public function getDepartureDate(): ?string
    {
        return $this->departureDate;
    }

    public function getArrivalDate(): ?string
    {
        return $this->arrivalDate;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getPriceWithBaggage(): ?int
    {
        return $this->priceWithBaggage;
    }

    public function getBaggage(): ?int
    {
        return $this->baggage;
    }

    public function getRefound(): ?boolean
    {
        return $this->refound;
    }
}
