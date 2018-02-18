<?php
/**
 * Created by PhpStorm.
 * User: lamarques
 * Date: 13/02/2018
 * Time: 19:08
 */

namespace App\DataFixtures;


use App\Entity\Clientes;
use App\Entity\Pedidos;
use App\Entity\Usuarios;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory as Faker;

class LoadFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $clientes = $manager->getRepository(Clientes::class)->findOneBy(['ativo' => true]);
        $usuario = $manager->getRepository(Usuarios::class)->findOneBy(['ativo' => true]);
        //add 10 pedidos para testes de listagem
        for($i = 0; $i < 10; $i++) {
            $pedido = new Pedidos();
            $faker = Faker::create();
            $pedido->setClienteId($clientes)
                ->setUsuarioId($usuario)
                ->setCodigoReserva($faker->numberBetween(0,10000))
                ->setObservacoes($faker->text(200))
                ->setValorTotal($faker->randomFloat(4,10))
                ->setDataPedido(new \DateTime())
                ->setDataUpdate(new \DateTime())
                ->setAtivo(true);
            $manager->persist($pedido);
        }
        $manager->flush();
    }

}