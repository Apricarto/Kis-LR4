<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Ticket;

class TicketsController extends AbstractController
{
    //Получить информацию о поиске билетов
    public function GetTickets()
    {
        $tickets = $this->getDoctrine()
            ->getRepository(Ticket::class)
            ->findAll();
        if (!$tickets){
            return new Response("Table is empty");
        }
        $arrayCollection = array();

        foreach($tickets as $ticket) {
            $arrayCollection[] = array(
                'id' => $ticket->getId(),
                'departureCity' => $ticket->getDepartureCity(),
                'arrivalCity' => $ticket->getArrivalCity(),
                'departureDate' => $ticket->getDepartureDate(),
                'arriveDate' => $ticket->getArriveDate(),
                'passengers' => $ticket->getPassengers()
            );
        }

        return new JsonResponse($arrayCollection);
    }

    //Изменить информацию о поиске билетов
    public function PutTicket($id, Request $request):Response{
        $entityManager = $this->getDoctrine()->getManager();
        $ticket = $this->getDoctrine()
            ->getRepository(Ticket::class)
            ->find($id);
        if(!$ticket) {
            $ticket = new Ticket();
            $ticket->setDepartureCity($request->request->get('departureCity'));
            $ticket->setArrivalDate($request->request->get('arriveDate'));
            $ticket->setPassenger($request->request->get('passengers'));
            $entityManager->persist($ticket);
            $entityManager->flush();
            return new Response('Ticket has been succesfully created with ID: ' . $ticket->getId());
        } else {
            $ticket->setDepartureCity($request->request->get('departureCity'));
            $ticket->setArrivalDate($request->request->get('arriveDate'));
            $ticket->setPassenger($request->request->get('passengers'));
            $entityManager->persist($ticket);
            $entityManager->flush();
            return new Response('Ticket has been succesfully updated with ID: ' . $ticket->getId());
        }
    }
}