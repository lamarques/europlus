<?php
/**
 * Created by PhpStorm.
 * User: lamarques
 * Date: 12/02/2018
 * Time: 20:44
 */

namespace App\Controller;


use App\Entity\Clientes;
use App\Entity\Pedidos;
use App\Entity\Usuarios;
use App\Repository\PedidosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiPedidosController extends Controller
{

    /**
     * @Route("/api/pedidos")
     * @Route("/api/pedidos/{busca}", defaults={"busca" = null})
     * @Method({"GET"})
     */
    public function showAction(EntityManagerInterface $entityManager, $busca = null)
    {
        if (!empty($busca)) {
            $pedidosRepository = $entityManager->getRepository(Pedidos::class);
            $pedidos = $pedidosRepository->findByGenericFilter($busca);
        } else {
            $pedidos = $entityManager->getRepository(Pedidos::class)->findBy(['ativo' => true], ['id' => 'desc']);
        }
        $data = $this->get("serializer")->serialize($pedidos, 'json', ['groups' => ['rest']]);
        $response = new JsonResponse();
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/api/pedidos")
     * @Method({"POST"})
     */
    public function savePedidos(Request $request, EntityManagerInterface $entityManager)
    {
        $dados = json_decode($request->getContent());
        $clientes = $entityManager->getRepository(Clientes::class)->find($dados->idcliente);
        $usuarios = $entityManager->getRepository(Usuarios::class)->find(5);
        $pedidos = new Pedidos();
        $pedidos->setClienteId($clientes);
        $pedidos->setUsuarioId($usuarios);
        if(!empty($dados->codigoReserva)) {
            $pedidos->setCodigoReserva($dados->codigoReserva);
        }
        $pedidos->setObservacoes($dados->observacoes);
        $pedidos->setValorTotal($dados->valorTotal);
        if(!empty($dados->valorDesconto)) {
            $pedidos->setValorDesconto($dados->valorDesconto);
        }
        $pedidos->setDataPedido(new \DateTime());
        $pedidos->setDataUpdate(new \DateTime());
        $pedidos->setStatus('AC');
        $pedidos->setAtivo(true);
        $entityManager->persist($pedidos);
        $entityManager->flush();
        $data = $this->get("serializer")->serialize($pedidos, 'json', ['groups' => ['rest']]);
        $response = new JsonResponse();
        $response->setContent($data);
        return $response;
    }
}