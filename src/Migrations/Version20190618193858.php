<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190618193858 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carmanager_user ADD garage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carmanager_user ADD CONSTRAINT FK_BFA539B2C4FFF555 FOREIGN KEY (garage_id) REFERENCES carmanager_garage (id)');
        $this->addSql('CREATE INDEX IDX_BFA539B2C4FFF555 ON carmanager_user (garage_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carmanager_user DROP FOREIGN KEY FK_BFA539B2C4FFF555');
        $this->addSql('DROP INDEX IDX_BFA539B2C4FFF555 ON carmanager_user');
        $this->addSql('ALTER TABLE carmanager_user DROP garage_id');
    }
}
