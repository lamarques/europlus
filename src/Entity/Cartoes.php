<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartoesRepository")
 */
class Cartoes
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
     * @var string
     *
     * @ORM\Column(type="string", name="bandeira", length=40)
     */
    private $bandeira;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="tipo", length=1)
     */
    private $tipo;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", name="ativo", options={"default" : true})
     */
    private $ativo;

    /**
     * @var Pagamentos
     *
     * @ORM\OneToMany(targetEntity="Pagamentos", mappedBy="cartoesId")
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
     * @return Cartoes
     */
    public function setId(int $id): Cartoes
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getBandeira(): string
    {
        return $this->bandeira;
    }

    /**
     * @param string $bandeira
     * @return Cartoes
     */
    public function setBandeira(string $bandeira): Cartoes
    {
        $this->bandeira = $bandeira;
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
     * @return Cartoes
     */
    public function setTipo(string $tipo): Cartoes
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
     * @return Cartoes
     */
    public function setAtivo(bool $ativo): Cartoes
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return Pagamentos
     */
    public function getPagamentos(): Pagamentos
    {
        return $this->pagamentos;
    }


}
