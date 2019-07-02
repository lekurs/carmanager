<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702150542 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carmanager_order ADD credit_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE carmanager_order ADD CONSTRAINT FK_DF748EE3CE062FF9 FOREIGN KEY (credit_id) REFERENCES carmanager_credit (id)');
        $this->addSql('CREATE INDEX IDX_DF748EE3CE062FF9 ON carmanager_order (credit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carmanager_order DROP FOREIGN KEY FK_DF748EE3CE062FF9');
        $this->addSql('DROP INDEX IDX_DF748EE3CE062FF9 ON carmanager_order');
        $this->addSql('ALTER TABLE carmanager_order DROP credit_id');
    }
}
