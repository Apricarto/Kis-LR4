<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Passenger;

class PassengersController extends AbstractController
{
    public function GetPassengers()
    {
        $passengers = $this->getDoctrine()
            ->getRepository(Passenger::class)
            ->findAll();
        if (!$passengers){
            return new Response("Table is empty");
        }
        $arrayCollection = array();

        foreach($passengers as $passenger) {
            $arrayCollection[] = array(
                'id' => $passenger->getId(),
                'amountOfAdults' => $passenger->getAmountOfAdults(),
                'amountOfChildren' => $passenger->getAmountOfChildren(),
                'amountOfBabies' => $passenger->getAmountOfBabies(),
                'ticketType' => $passenger->getTicketType(),
            );
        }

        return new JsonResponse($arrayCollection);
    }

    public function PostPassenger(Request $request):Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $passenger = new Passenger();
        $passenger->setAmountOfAdults($request->request->get('amountOfAdults'));
        $passenger->setAmountOfChildren($request->request->get('amountOfChildren'));
        $passenger->setAmountOfBabies($request->request->get('amountOfBabies'));
        $passenger->setTicketType($request->request->get('ticketType'));
        $entityManager->persist($passenger);
        $entityManager->flush();
        return new Response('Passenger has been successfully added with ID: '.$passenger->getId());
    }

    public function PutPassenger($id, Request $request):Response{
        $entityManager = $this->getDoctrine()->getManager();
        $passenger = $this->getDoctrine()
            ->getRepository(Passenger::class)
            ->find($id);
        if(!$passenger) {
            $passenger = new Passenger();
            $passenger->setAmountOfAdults($request->request->get('amountOfAdults'));
            $passenger->setAmountOfChildren($request->request->get('amountOfChildren'));
            $passenger->setAmountOfBabies($request->request->get('amountOfBabies'));
            $passenger->setTicketType($request->request->get('ticketType'));
            $entityManager->persist($passenger);
            $entityManager->flush();
            return new Response('Passenger has been succesfully created with ID: '.$passenger->getId());
        } else {
            $passenger = new Passenger();
            $passenger->setAmountOfAdults($request->request->get('amountOfAdults'));
            $passenger->setAmountOfChildren($request->request->get('amountOfChildren'));
            $passenger->setAmountOfBabies($request->request->get('amountOfBabies'));
            $passenger->setTicketType($request->request->get('ticketType'));
            $entityManager->persist($passenger);
            $entityManager->flush();
            return new Response('Passenger has been succesfully updated with ID: '.$passenger->getId());
        }
    }

    public function DeletePassenger($id){
        $entityManager = $this->getDoctrine()->getManager();
        $passenger = $entityManager->getRepository(Passenger::class)->find($id);
        if (!$passenger) return new Response('Passenger not found');
        $entityManager->remove($passenger);
        $entityManager->flush();
        return new Response('Passenger with ID '.$id.' has been succesfully deleted');
    }
}