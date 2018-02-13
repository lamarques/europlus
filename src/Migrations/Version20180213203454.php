<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180213203454 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cartoes (id INT AUTO_INCREMENT NOT NULL, bandeira VARCHAR(40) NOT NULL, tipo VARCHAR(1) NOT NULL, ativo TINYINT(1) DEFAULT \'1\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pagamentos (id INT AUTO_INCREMENT NOT NULL, pedidos_id INT DEFAULT NULL, cartoes_id INT DEFAULT NULL, tipo_pagamento_id INT DEFAULT NULL, data_emissao DATETIME NOT NULL, data_vencimento DATETIME DEFAULT NULL, data_pagamento DATETIME DEFAULT NULL, valor NUMERIC(12, 2) NOT NULL, status VARCHAR(50) NOT NULL, INDEX IDX_EFE46511213530F2 (pedidos_id), INDEX IDX_EFE465112CEA76D5 (cartoes_id), INDEX IDX_EFE46511533CDFF7 (tipo_pagamento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE46511213530F2 FOREIGN KEY (pedidos_id) REFERENCES pedidos (id)');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE465112CEA76D5 FOREIGN KEY (cartoes_id) REFERENCES cartoes (id)');
        $this->addSql('ALTER TABLE pagamentos ADD CONSTRAINT FK_EFE46511533CDFF7 FOREIGN KEY (tipo_pagamento_id) REFERENCES tipo_pagamento (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pagamentos DROP FOREIGN KEY FK_EFE465112CEA76D5');
        $this->addSql('DROP TABLE cartoes');
        $this->addSql('DROP TABLE pagamentos');
    }
}
