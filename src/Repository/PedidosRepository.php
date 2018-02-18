<?php

namespace App\Repository;

use App\Entity\Clientes;
use App\Entity\Pedidos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PedidosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pedidos::class);
    }

    public function findByGenericFilter($value)
    {
        return $this->createQueryBuilder('p')
            ->join(Clientes::class, "c", 'WITH', 'p.clienteId = c.id')
            ->where('p.codigoReserva LIKE :value')->setParameter('value', $value."%")
            ->orWhere('c.nome LIKE :value')->setParameter('value', "%" . $value. "%")
            ->orWhere('c.cpfCnpj LIKE :value')->setParameter('value', "%" . $value. "%")
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
}
