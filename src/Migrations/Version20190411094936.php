<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190411094936 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(250) NOT NULL, address VARCHAR(250) NOT NULL, postal_code VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_address (property_id INT NOT NULL, address_id INT NOT NULL, INDEX IDX_548325F9549213EC (property_id), INDEX IDX_548325F9F5B7AF75 (address_id), PRIMARY KEY(property_id, address_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE property_address ADD CONSTRAINT FK_548325F9549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_address ADD CONSTRAINT FK_548325F9F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property DROP city, DROP address, DROP postal_code');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property_address DROP FOREIGN KEY FK_548325F9F5B7AF75');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE property_address');
        $this->addSql('ALTER TABLE property ADD city VARCHAR(250) NOT NULL COLLATE utf8mb4_unicode_ci, ADD address VARCHAR(250) NOT NULL COLLATE utf8mb4_unicode_ci, ADD postal_code VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
