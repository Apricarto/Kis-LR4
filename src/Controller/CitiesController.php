<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\City;

class CitiesController extends AbstractController
{
    public function GetCities() {
        $cities = $this-> getDoctrine()
            ->getRepository(City::class)
            ->findAll();
        if (!$cities) {
            return new Response("Table is empty");
        }
        $arrayCollection = array();

        foreach($cities as $city) {
            $arrayCollection[] = array(
                'id' => $city->getId(),
                'name' => $city->getName(),
                'GMT' => $city->getGMT()
            );
        }

        return new JsonResponse($arrayCollection);
    }

    public function GetCity($id) {
        $city = $this->getDoctrine()
            ->getRepository(City::class)
            ->find($id);
        if (!$city) {
            return new Response('City not found');
        }
        $cityJSON = [
            'id' => $city->getId(),
            'name' => $city->getName(),
            'GMT' => $city->getGMT()
        ];
        return new JsonResponse($cityJSON);
    }
}