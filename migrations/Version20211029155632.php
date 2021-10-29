<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029155632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient ADD default_unit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870A382148 FOREIGN KEY (default_unit_id) REFERENCES unit (id)');
        $this->addSql('CREATE INDEX IDX_6BAF7870A382148 ON ingredient (default_unit_id)');
        $this->addSql('ALTER TABLE recipe ADD people_number INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870A382148');
        $this->addSql('DROP INDEX IDX_6BAF7870A382148 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP default_unit_id');
        $this->addSql('ALTER TABLE recipe DROP people_number');
    }
}
