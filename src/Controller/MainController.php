<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\MainEntity;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\MainEntityRepository;
use Symfony\Component\HttpFoundation\Request;



class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MainController.php',
        ]);
    }
    #[Route('/update-table', name: 'app_main')]
    public function updateTable(EntityManagerInterface $entityManager):JsonResponse
    {
        $file = fopen('airports.csv', 'r');

        $dataArray = array();
        while (($data = fgetcsv($file, 1000, ",")) !== false) {
            $dataArray[] = $data;
        }
        fclose($file);
        foreach($dataArray as $data){
            $entity = new MainEntity();
            $entity->setShortcode($data[1]);
            $entity->setName($data[2]);
            $entity->setCity($data[3]);
            $entity->setCountry($data[4]);
            $entity->setLocation($data[5]);
            $entityManager->persist($entity);
        }
        $entityManager->flush();

        return $this->json([
            "status"=>"Success",
            "message"=>"Veriler eklendi."
        ]);
    }
    #[Route('/search', name: 'search',methods:"POST")]
    public function search(MainEntityRepository $repository, Request $request): JsonResponse
    {
        $jsonData = json_decode($request->getContent(), true);

        $type = $jsonData['type'] ?? null;
        $searchString = $jsonData['searchString'] ?? null;
    
        if (!$type || !$searchString) {
            return $this->json(['error' => 'Missing parameters'], 400);
        }
    
        
    
        
        $result = $repository->findByTypeAndSearchString($type, $searchString);
        if (!$result) {
            return $this->json(['error' => 'No results found'], 404);
        }
        $jsonResult = [];
        foreach ($result as $item) {
            $jsonResult[] = [
                'id' => $item->getId(),
                'shortcode' => $item->getShortcode(),
                'name' => $item->getName(),
                'city' => $item->getCity(),
                'country' => $item->getCountry(),
                'location' => $item->getLocation(),
            ];
        }
    
        return $this->json($jsonResult);
    }

}
