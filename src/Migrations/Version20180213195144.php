<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180213195144 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE clientes (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, cpfcnpj VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, data_cadastro DATETIME NOT NULL, data_updated DATETIME NOT NULL, ativo TINYINT(1) DEFAULT \'1\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedidos (id INT AUTO_INCREMENT NOT NULL, cliente_id INT DEFAULT NULL, usuario_id INT DEFAULT NULL, codigo_reserva VARCHAR(255) NOT NULL, data_pedido DATETIME NOT NULL, data_updated DATETIME NOT NULL, observacoes LONGTEXT NOT NULL, valor_total NUMERIC(10, 0) NOT NULL, valor_desconto NUMERIC(10, 0) NOT NULL, status VARCHAR(10) NOT NULL, ativo TINYINT(1) DEFAULT \'1\' NOT NULL, INDEX IDX_6716CCAADE734E51 (cliente_id), INDEX IDX_6716CCAADB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_pagamento (id INT AUTO_INCREMENT NOT NULL, tipo VARCHAR(50) NOT NULL, ativo TINYINT(1) DEFAULT \'1\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL, ip_acesso VARCHAR(15) NOT NULL, data_acesso DATETIME NOT NULL, perfil VARCHAR(255) NOT NULL, ativo TINYINT(1) DEFAULT \'1\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAADE734E51 FOREIGN KEY (cliente_id) REFERENCES clientes (id)');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAADB38439E FOREIGN KEY (usuario_id) REFERENCES usuarios (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY FK_6716CCAADE734E51');
        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY FK_6716CCAADB38439E');
        $this->addSql('DROP TABLE clientes');
        $this->addSql('DROP TABLE pedidos');
        $this->addSql('DROP TABLE tipo_pagamento');
        $this->addSql('DROP TABLE usuarios');
    }
}
