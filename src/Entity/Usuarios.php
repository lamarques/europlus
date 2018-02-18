<?php

namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuariosRepository")
 */
class Usuarios
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
     * @ORM\Column(type="string", name="nome", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="email", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="senha", length=255)
     */
    private $senha;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="ip_acesso", length=15, nullable=true)
     */
    private $ipAcesso;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="data_acesso", nullable=true)
     */
    private $dataAcesso;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="perfil", length=255)
     */
    private $perfil;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", name="ativo", options={"default" = true})
     */
    private $ativo;

    /**
     * @var Pedidos
     *
     * @ORM\OneToMany(targetEntity="Pedidos", mappedBy="usuarioId")
     */
    private $pedidos;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Usuarios
     */
    public function setId(int $id): Usuarios
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
     * @return Usuarios
     */
    public function setNome(string $nome): Usuarios
    {
        $this->nome = $nome;
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
     * @return Usuarios
     */
    public function setEmail(string $email): Usuarios
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     * @return Usuarios
     */
    public function setSenha(string $senha): Usuarios
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAcesso(): string
    {
        return $this->ipAcesso;
    }

    /**
     * @param string $ipAcesso
     * @return Usuarios
     */
    public function setIpAcesso(string $ipAcesso): Usuarios
    {
        $this->ipAcesso = $ipAcesso;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataAcesso(): \DateTime
    {
        return $this->dataAcesso;
    }

    /**
     * @param \DateTime $dataAcesso
     * @return Usuarios
     */
    public function setDataAcesso(\DateTime $dataAcesso): Usuarios
    {
        $this->dataAcesso = $dataAcesso;
        return $this;
    }

    /**
     * @return string
     */
    public function getPerfil(): string
    {
        return $this->perfil;
    }

    /**
     * @param string $perfil
     * @return Usuarios
     */
    public function setPerfil(string $perfil): Usuarios
    {
        $this->perfil = $perfil;
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
     * @return Usuarios
     */
    public function setAtivo(bool $ativo): Usuarios
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
