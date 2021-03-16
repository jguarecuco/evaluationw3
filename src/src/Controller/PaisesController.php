<?php
namespace App\Controller;
use Psr\Log\LoggerInterface;
use App\Entity\Paises;
use App\Repository\PaisesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PaisesController extends AbstractController{
    /**
     *  @Route("/")
     */
    public function index(){
        return $this->render('home/show.html.twig',[
            "text"=>"Busca tu país"
        ]);
    }
    /**
     *  @Route("/paises",name="paises_get")
     * 
    */
    public function list(Request $request, LoggerInterface $logger,PaisesRepository $paisesRepository){
        $response=new JsonResponse();
        $name=$request->get("name");
        if(strlen($name)<3){
            $response->setStatusCode(JsonResponse::HTTP_NO_CONTENT);
        }
        $paises=$paisesRepository->getAll("%".$name.'%');
        $total=$paisesRepository->totalPopulation();
         $paisesArray=[];
           foreach($paises as $pais){
               $paisesArray[]=[
                   "id"=>$pais->getId(),
                   "name"=>$pais->getName(),
                   "population"=>(int) $pais->getPopulation(),
                   "porcentaje"=>100*(int) $pais->getPopulation()/(int)$total
               ];
           }
            if(count($paisesArray)==0){
           // $response->setData( );
            $response->setStatusCode(JsonResponse::HTTP_NO_CONTENT);
            }else{
                $response->setData($paisesArray);
            }
            return $response;
    }
}