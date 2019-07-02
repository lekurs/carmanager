<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190701152221 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carmanager_garage DROP FOREIGN KEY FK_58DB94A24827B9B2');
        $this->addSql('DROP INDEX IDX_58DB94A24827B9B2 ON carmanager_garage');
        $this->addSql('ALTER TABLE carmanager_garage ADD plaque_id INT DEFAULT NULL, CHANGE marque_id brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carmanager_garage ADD CONSTRAINT FK_58DB94A244F5D008 FOREIGN KEY (brand_id) REFERENCES carmanager_brand (id)');
        $this->addSql('ALTER TABLE carmanager_garage ADD CONSTRAINT FK_58DB94A2D89B8F16 FOREIGN KEY (plaque_id) REFERENCES carmanager_plaque (id)');
        $this->addSql('CREATE INDEX IDX_58DB94A244F5D008 ON carmanager_garage (brand_id)');
        $this->addSql('CREATE INDEX IDX_58DB94A2D89B8F16 ON carmanager_garage (plaque_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carmanager_garage DROP FOREIGN KEY FK_58DB94A244F5D008');
        $this->addSql('ALTER TABLE carmanager_garage DROP FOREIGN KEY FK_58DB94A2D89B8F16');
        $this->addSql('DROP INDEX IDX_58DB94A244F5D008 ON carmanager_garage');
        $this->addSql('DROP INDEX IDX_58DB94A2D89B8F16 ON carmanager_garage');
        $this->addSql('ALTER TABLE carmanager_garage ADD marque_id INT DEFAULT NULL, DROP brand_id, DROP plaque_id');
        $this->addSql('ALTER TABLE carmanager_garage ADD CONSTRAINT FK_58DB94A24827B9B2 FOREIGN KEY (marque_id) REFERENCES carmanager_brand (id)');
        $this->addSql('CREATE INDEX IDX_58DB94A24827B9B2 ON carmanager_garage (marque_id)');
    }
}
