<?php

namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientesRepository")
 */
class Clientes
{
    /**
     * @var int
     *
     * @Groups({"rest"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups({"rest"})
     * @ORM\Column(type="string", length=255, name="nome")
     */
    private $nome;

    /**
     * @var string
     *
     * @Groups({"rest"})
     * @ORM\Column(type="string", length=20, name="cpfcnpj")
     */
    private $cpfCnpj;

    /**
     * @var string
     *
     * @Groups({"rest"})
     * @ORM\Column(type="string", length=255, name="email")
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="data_cadastro")
     */
    private $dataCadastro;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="data_updated")
     */
    private $dataUpdate;

    /**
     * @var boolean
     *
     * @Groups({"rest"})
     * @ORM\Column(type="boolean", name="ativo", options={"default" : true})
     */
    private $ativo;

    /**
     * @var Pedidos
     *
     * @ORM\OneToMany(targetEntity="Pedidos", mappedBy="clienteId")
     */
    private $pedidos;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Clientes
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Clientes
     */
    public function setNome(string $nome): Clientes
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCnpj(): string
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $cpfCnpj
     * @return Clientes
     */
    public function setCpfCnpj(string $cpfCnpj): Clientes
    {
        $this->cpfCnpj = $cpfCnpj;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Clientes
     */
    public function setEmail(string $email): Clientes
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCadastro(): \DateTime
    {
        return $this->dataCadastro;
    }

    /**
     * @param \DateTime $dataCadastro
     * @return Clientes
     */
    public function setDataCadastro(\DateTime $dataCadastro): Clientes
    {
        $this->dataCadastro = $dataCadastro;
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
     * @return Clientes
     */
    public function setDataUpdate(\DateTime $dataUpdate): Clientes
    {
        $this->dataUpdate = $dataUpdate;
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
     * @return Clientes
     */
    public function setAtivo(bool $ativo): Clientes
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return Pedidos
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }

}
