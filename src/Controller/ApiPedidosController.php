<?php
/**
 * Created by PhpStorm.
 * User: lamarques
 * Date: 12/02/2018
 * Time: 20:44
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\BrowserKit\Request;

class ApiPedidosController extends Controller
{

    /**
     * @Route("/api/pedidos")
     * @Route("/api/pedidos/{busca}", defaults={"busca" = null})
     * @Method({"GET"})
     */
    public function getPedidos($busca = null)
    {
        $dados = [];
        if(!empty($busca)){
            for($i = 0; $i < 3; $i++){
                $dados[] = [
                    'id' => $i + 1,
                    'codigoReserva' => rand(0, 999999),
                    'cliente' => 'Maria rui',
                    'cpfcnpj' => '999.999.999-99'
                ];
            }
        } else {
            for($i = 0; $i < 10; $i++){
                $dados[] = [
                    'id' => $i + 1,
                    'codigoReserva' => rand(0, 999999),
                    'cliente' => 'Maria rui',
                    'cpfcnpj' => '999.999.999-99'
                ];
            }
        }
        return $this->json($dados);
    }

    /**
     * @Route("/api/pedidos")
     * @Method({"POST"})
     */
    public function savePedidos()
    {
        return $this->json(1,200);
    }
}