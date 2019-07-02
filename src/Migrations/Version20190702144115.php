<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702144115 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE carmanager_order (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', car_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', number VARCHAR(255) NOT NULL, order_date DATE NOT NULL, delivery_date DATE NOT NULL, selling_price DOUBLE PRECISION NOT NULL, purchasing_price DOUBLE PRECISION NOT NULL, discount DOUBLE PRECISION NOT NULL, quality_bonus DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_DF748EE396901F54 (number), INDEX IDX_DF748EE3C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carmanager_order ADD CONSTRAINT FK_DF748EE3C3C6F69F FOREIGN KEY (car_id) REFERENCES carmanager_car (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE carmanager_order');
    }
}
