<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\PedidosRepository;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidosRepository")
 */
class Pedidos
{
    /**
     * @var int
     *
     * @Groups({"rest"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @Groups({"rest"})
     * @ORM\Column(type="string", name="codigo_reserva", length=255, nullable=true)
     */
    private $codigoReserva;

    /**
     * @var \DateTime
     *
     * @Groups({"rest"})
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="data_pedido")
     */
    private $dataPedido;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="data_updated")
     */
    private $dataUpdate;

    /**
     * @var string
     *
     * @Groups({"rest"})
     * @ORM\Column(type="text", name="observacoes")
     */
    private $observacoes;

    /**
     * @var float
     *
     * @Groups({"rest"})
     * @ORM\Column(type="decimal", precision=12, scale=2, name="valor_total")
     */
    private $valorTotal;

    /**
     * @var float
     *
     * @Groups({"rest"})
     * @ORM\Column(type="decimal", precision=12, scale=2, name="valor_desconto", nullable=true)
     */
    private $valorDesconto;

    /**
     * @var string
     *
     * @Groups({"rest"})
     * @ORM\Column(type="string", name="status", length=10)
     */
    private $status;

    /**
     * @var boolean
     *
     * @Groups({"rest"})
     * @ORM\Column(type="boolean", name="ativo", options={"default" : true})
     */
    private $ativo;

    /**
     * @var Clientes
     *
     * @Groups({"rest"})
     * @ORM\ManyToOne(targetEntity="Clientes", inversedBy="pedidos")
     * @ORM\JoinColumn(name="clienteId", referencedColumnName="id")
     */
    protected $clienteId;

    /**
     * @var Usuarios
     *
     * @Groups({"rest"})
     * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="pedidos")
     * @ORM\JoinColumn(name="usuarioId", referencedColumnName="id")
     */
    protected $usuarioId;

    /**
     * @var Pagamentos
     *
     * @ORM\OneToMany(targetEntity="Pagamentos", mappedBy="pedidosId")
     */
    private $pagamentos;


    public function __construct()
    {
        $this->clienteId = new ArrayCollection();
        $this->usuarioId = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Pedidos
     */
    public function setId(int $id): Pedidos
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodigoReserva(): ?string
    {
        return $this->codigoReserva;
    }

    /**
     * @param string $codigoReserva
     * @return Pedidos
     */
    public function setCodigoReserva(string $codigoReserva): Pedidos
    {
        $this->codigoReserva = $codigoReserva;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataPedido(): \DateTime
    {
        return $this->dataPedido;
    }

    /**
     * @param \DateTime $dataPedido
     * @return Pedidos
     */
    public function setDataPedido(\DateTime $dataPedido): Pedidos
    {
        $this->dataPedido = $dataPedido;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataUpdate(): \DateTime
    {
        return $this->dataUpdate;
    }

    /**
     * @param \DateTime $dataUpdate
     * @return Pedidos
     */
    public function setDataUpdate(\DateTime $dataUpdate): Pedidos
    {
        $this->dataUpdate = $dataUpdate;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservacoes(): string
    {
        return $this->observacoes;
    }

    /**
     * @param string $observacoes
     * @return Pedidos
     */
    public function setObservacoes(string $observacoes): Pedidos
    {
        $this->observacoes = $observacoes;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorTotal(): float
    {
        return $this->valorTotal;
    }

    /**
     * @param float $valorTotal
     * @return Pedidos
     */
    public function setValorTotal(float $valorTotal): Pedidos
    {
        $this->valorTotal = (float) $valorTotal;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }

    /**
     * @param float $valorDesconto
     * @return Pedidos
     */
    public function setValorDesconto(float $valorDesconto): Pedidos
    {
        $this->valorDesconto = $valorDesconto;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Pedidos
     */
    public function setStatus(string $status): Pedidos
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     * @return Pedidos
     */
    public function setAtivo(bool $ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return Clientes
     */
    public function getClienteId()
    {
        return $this->clienteId;
    }

    /**
     * @param Clientes $clienteId
     * @return Pedidos
     */
    public function setClienteId(Clientes $clienteId)
    {
        $this->clienteId = $clienteId;
        return $this;
    }

    /**
     * @return Usuarios
     */
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * @param Usuarios $usuarioId
     * @return Pedidos
     */
    public function setUsuarioId(Usuarios $usuarioId)
    {
        $this->usuarioId = $usuarioId;
        return $this;
    }

    /**
     * @return Pagamentos
     */
    public function getPagamentos()
    {
        return $this->pagamentos;
    }



}
