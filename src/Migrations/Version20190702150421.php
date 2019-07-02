<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702150421 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE carmanager_credit_type (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', type VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_7E34526C8CDE5729 (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carmanager_credit (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', credit_type_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', amount DOUBLE PRECISION NOT NULL, INDEX IDX_DB3C9B57FFC8EBBC (credit_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carmanager_credit ADD CONSTRAINT FK_DB3C9B57FFC8EBBC FOREIGN KEY (credit_type_id) REFERENCES carmanager_credit_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carmanager_credit DROP FOREIGN KEY FK_DB3C9B57FFC8EBBC');
        $this->addSql('DROP TABLE carmanager_credit_type');
        $this->addSql('DROP TABLE carmanager_credit');
    }
}
