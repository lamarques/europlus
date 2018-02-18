<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180218012025 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pagamentos DROP FOREIGN KEY FK_EFE465112CEA76D5');
        $this->addSql('ALTER TABLE pagamentos DROP FOREIGN KEY FK_EFE46511533CDFF7');
        $this->addSql('DROP INDEX IDX_EFE465112CEA76D5 ON pagamentos');
        $this->addSql('DROP INDEX IDX_EFE46511533CDFF7 ON pagamentos');
        $this->addSql('ALTER TABLE pagamentos ADD cartoesId INT DEFAULT NULL, ADD tipoPagamentoId INT DEFAULT NULL, DROP cartoes_id, DROP tipo_pagamento_id');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE465115EABE796 FOREIGN KEY (cartoesId) REFERENCES cartoes (id)');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE46511A37A2DA5 FOREIGN KEY (tipoPagamentoId) REFERENCES tipo_pagamento (id)');
        $this->addSql('CREATE INDEX IDX_EFE465115EABE796 ON pagamentos (cartoesId)');
        $this->addSql('CREATE INDEX IDX_EFE46511A37A2DA5 ON pagamentos (tipoPagamentoId)');
        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY FK_6716CCAADB38439E');
        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY FK_6716CCAADE734E51');
        $this->addSql('DROP INDEX IDX_6716CCAADE734E51 ON pedidos');
        $this->addSql('DROP INDEX IDX_6716CCAADB38439E ON pedidos');
        $this->addSql('ALTER TABLE pedidos ADD clienteId INT DEFAULT NULL, ADD usuarioId INT DEFAULT NULL, DROP cliente_id, DROP usuario_id');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAAA5932DC5 FOREIGN KEY (clienteId) REFERENCES clientes (id)');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAAEEC9F102 FOREIGN KEY (usuarioId) REFERENCES usuarios (id)');
        $this->addSql('CREATE INDEX IDX_6716CCAAA5932DC5 ON pedidos (clienteId)');
        $this->addSql('CREATE INDEX IDX_6716CCAAEEC9F102 ON pedidos (usuarioId)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pagamentos DROP FOREIGN KEY FK_EFE465115EABE796');
        $this->addSql('ALTER TABLE pagamentos DROP FOREIGN KEY FK_EFE46511A37A2DA5');
        $this->addSql('DROP INDEX IDX_EFE465115EABE796 ON pagamentos');
        $this->addSql('DROP INDEX IDX_EFE46511A37A2DA5 ON pagamentos');
        $this->addSql('ALTER TABLE pagamentos ADD cartoes_id INT DEFAULT NULL, ADD tipo_pagamento_id INT DEFAULT NULL, DROP cartoesId, DROP tipoPagamentoId');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE465112CEA76D5 FOREIGN KEY (cartoes_id) REFERENCES cartoes (id)');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE46511533CDFF7 FOREIGN KEY (tipo_pagamento_id) REFERENCES tipo_pagamento (id)');
        $this->addSql('CREATE INDEX IDX_EFE465112CEA76D5 ON pagamentos (cartoes_id)');
        $this->addSql('CREATE INDEX IDX_EFE46511533CDFF7 ON pagamentos (tipo_pagamento_id)');
        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY FK_6716CCAAA5932DC5');
        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY FK_6716CCAAEEC9F102');
        $this->addSql('DROP INDEX IDX_6716CCAAA5932DC5 ON pedidos');
        $this->addSql('DROP INDEX IDX_6716CCAAEEC9F102 ON pedidos');
        $this->addSql('ALTER TABLE pedidos ADD cliente_id INT DEFAULT NULL, ADD usuario_id INT DEFAULT NULL, DROP clienteId, DROP usuarioId');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAADB38439E FOREIGN KEY (usuario_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAADE734E51 FOREIGN KEY (cliente_id) REFERENCES clientes (id)');
        $this->addSql('CREATE INDEX IDX_6716CCAADE734E51 ON pedidos (cliente_id)');
        $this->addSql('CREATE INDEX IDX_6716CCAADB38439E ON pedidos (usuario_id)');
    }
}
