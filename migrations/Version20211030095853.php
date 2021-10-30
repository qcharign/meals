<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030095853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specific_conversion (id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_7C9E66C2933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specific_conversion ADD CONSTRAINT FK_7C9E66C2933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE specific_conversion ADD CONSTRAINT FK_7C9E66C2BF396750 FOREIGN KEY (id) REFERENCES conversion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conversion ADD dtype VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE specific_conversion');
        $this->addSql('ALTER TABLE conversion DROP dtype');
    }
}
