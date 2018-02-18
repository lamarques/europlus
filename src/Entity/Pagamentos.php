<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PagamentosRepository")
 */
class Pagamentos
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="data_emissao")
     */
    private $dataEmissao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="data_vencimento", nullable=true)
     */
    private $dataVencimento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="data_pagamento", nullable=true)
     */
    private $dataPagamento;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=12, scale=2, name="valor")
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="status", length=50)
     */
    private $status;

    /**
     * @var Pedidos
     *
     * @ORM\ManyToOne(targetEntity="Pedidos", inversedBy="pagamentos")
     * @ORM\JoinColumn(name="pedidos_id", referencedColumnName="id")
     */
    protected $pedidosId;

    /**
     * @var Cartoes
     *
     * @ORM\ManyToOne(targetEntity="Cartoes", inversedBy="pagamentos")
     * @ORM\JoinColumn(name="cartoesId", referencedColumnName="id")
     */
    protected $cartoesId;

    /**
     * @var TipoPagamento
     *
     * @ORM\ManyToOne(targetEntity="TipoPagamento", inversedBy="pagamentos")
     * @ORM\JoinColumn(name="tipoPagamentoId", referencedColumnName="id")
     */
    protected $tipoPagamentoId;

    public function __construct()
    {
        $this->pedidosId = new ArrayCollection();
        $this->cartoesId = new ArrayCollection();
        $this->tipoPagamentoId = new ArrayCollection();
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
     * @return Pagamentos
     */
    public function setId(int $id): Pagamentos
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataEmissao(): \DateTime
    {
        return $this->dataEmissao;
    }

    /**
     * @param \DateTime $dataEmissao
     * @return Pagamentos
     */
    public function setDataEmissao(\DateTime $dataEmissao): Pagamentos
    {
        $this->dataEmissao = $dataEmissao;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataVencimento(): \DateTime
    {
        return $this->dataVencimento;
    }

    /**
     * @param \DateTime $dataVencimento
     * @return Pagamentos
     */
    public function setDataVencimento(\DateTime $dataVencimento): Pagamentos
    {
        $this->dataVencimento = $dataVencimento;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataPagamento(): \DateTime
    {
        return $this->dataPagamento;
    }

    /**
     * @param \DateTime $dataPagamento
     * @return Pagamentos
     */
    public function setDataPagamento(\DateTime $dataPagamento): Pagamentos
    {
        $this->dataPagamento = $dataPagamento;
        return $this;
    }

    /**
     * @return float
     */
    public function getValor(): float
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     * @return Pagamentos
     */
    public function setValor(float $valor): Pagamentos
    {
        $this->valor = $valor;
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
     * @return Pagamentos
     */
    public function setStatus(string $status): Pagamentos
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Pedidos
     */
    public function getPedidosId(): Pedidos
    {
        return $this->pedidosId;
    }

    /**
     * @param Pedidos $pedidosId
     * @return Pagamentos
     */
    public function setPedidosId(Pedidos $pedidosId): Pagamentos
    {
        $this->pedidosId = $pedidosId;
        return $this;
    }

    /**
     * @return Cartoes
     */
    public function getCartoesId(): Cartoes
    {
        return $this->cartoesId;
    }

    /**
     * @param Cartoes $cartoesId
     * @return Pagamentos
     */
    public function setCartoesId(Cartoes $cartoesId): Pagamentos
    {
        $this->cartoesId = $cartoesId;
        return $this;
    }

    /**
     * @return TipoPagamento
     */
    public function getTipoPagamentoId(): TipoPagamento
    {
        return $this->tipoPagamentoId;
    }

    /**
     * @param TipoPagamento $tipoPagamentoId
     * @return Pagamentos
     */
    public function setTipoPagamentoId(TipoPagamento $tipoPagamentoId): Pagamentos
    {
        $this->tipoPagamentoId = $tipoPagamentoId;
        return $this;
    }


}
