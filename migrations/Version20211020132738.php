<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211020132738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE department ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ingredient ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE recipe ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE department DROP slug');
        $this->addSql('ALTER TABLE ingredient DROP slug');
        $this->addSql('ALTER TABLE recipe DROP slug');
    }
}
