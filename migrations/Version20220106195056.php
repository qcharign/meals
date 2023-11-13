<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220106195056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booklet (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, UNIQUE INDEX UNIQ_818DB7207E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booklet_recipe (booklet_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_F75AE998668144B3 (booklet_id), INDEX IDX_F75AE99859D8A214 (recipe_id), PRIMARY KEY(booklet_id, recipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booklet ADD CONSTRAINT FK_818DB7207E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booklet_recipe ADD CONSTRAINT FK_F75AE998668144B3 FOREIGN KEY (booklet_id) REFERENCES booklet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booklet_recipe ADD CONSTRAINT FK_F75AE99859D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booklet_recipe DROP FOREIGN KEY FK_F75AE998668144B3');
        $this->addSql('DROP TABLE booklet');
        $this->addSql('DROP TABLE booklet_recipe');
    }
}
