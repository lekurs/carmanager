<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190618215822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE carmanager_marque (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_9D9264675A6F91CE (marque), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carmanager_garage ADD marque_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carmanager_garage ADD CONSTRAINT FK_58DB94A24827B9B2 FOREIGN KEY (marque_id) REFERENCES carmanager_marque (id)');
        $this->addSql('CREATE INDEX IDX_58DB94A24827B9B2 ON carmanager_garage (marque_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carmanager_garage DROP FOREIGN KEY FK_58DB94A24827B9B2');
        $this->addSql('DROP TABLE carmanager_marque');
        $this->addSql('DROP INDEX IDX_58DB94A24827B9B2 ON carmanager_garage');
        $this->addSql('ALTER TABLE carmanager_garage DROP marque_id');
    }
}
