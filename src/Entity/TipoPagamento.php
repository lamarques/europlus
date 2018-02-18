<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoPagamentoRepository")
 */
class TipoPagamento
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="tipo", length=50)
     */
    private $tipo;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", name="ativo", options={"default" = true})
     */
    private $ativo;

    /**
     * @var Pagamentos
     *
     * @ORM\OneToMany(targetEntity="Pagamentos", mappedBy="tipoPagamentoId")
     */
    private $pagamentos;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TipoPagamento
     */
    public function setId(int $id): TipoPagamento
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return TipoPagamento
     */
    public function setTipo(string $tipo): TipoPagamento
    {
        $this->tipo = $tipo;
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
     * @return TipoPagamento
     */
    public function setAtivo(bool $ativo): TipoPagamento
    {
        $this->ativo = $ativo;
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
