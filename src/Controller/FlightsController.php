<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Flight;

class FlightsController extends AbstractController
{
    public function GetFlights()
    {
        $flights = $this->getDoctrine()
            ->getRepository(Flight::class)
            ->findAll();
        if (!$flights) {
            return new Response("Table is empty");
        }
        $arrayCollection = array();

        foreach ($flights as $flight) {
            $arrayCollection[] = array(
                'id' => $flight->getId(),
                'departureCity' => $flight->getDepartureCity(),
                'arrivalCity' => $flight->getArrivalCity(),
                'departureDate' => $flight->gerDepartureDate(),
                'arrivalDate' => $flight->getArrivalDate(),
                'price' => $flight->getPrice(),
                'priceWithBaggage' => $flight->getPriceWithBaggage(),
                'baggage' => $flight->getBaggage(),
                'refound' => $flight->getRefound()
            );
        }

        return new JsonResponse($arrayCollection);
    }

    public function GetFlight($id)
    {
        $flight = $this->getDoctrine()
            ->getRepository(Flight::class)
            ->find($id);
        if (!$flight) {
            return new Response('Flight not found');
        }
        $flightJSON = [
            'id' => $flight->getId(),
            'departureCity' => $flight->getDepartureCity(),
            'arrivalCity' => $flight->getArrivalCity(),
            'departureDate' => $flight->gerDepartureDate(),
            'arrivalDate' => $flight->getArrivalDate(),
            'price' => $flight->getPrice(),
            'priceWithBaggage' => $flight->getPriceWithBaggage(),
            'baggage' => $flight->getBaggage(),
            'refound' => $flight->getRefound()
        ];
        return new JsonResponse($flightJSON);
    }
}