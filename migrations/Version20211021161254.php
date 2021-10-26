<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021161254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shopping_list (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopping_list_recipe (shopping_list_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_C14F483F23245BF9 (shopping_list_id), INDEX IDX_C14F483F59D8A214 (recipe_id), PRIMARY KEY(shopping_list_id, recipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopping_list_row (id INT AUTO_INCREMENT NOT NULL, shoppinglist_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_2BA6F0AB4F22EB9A (shoppinglist_id), INDEX IDX_2BA6F0AB933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shopping_list_recipe ADD CONSTRAINT FK_C14F483F23245BF9 FOREIGN KEY (shopping_list_id) REFERENCES shopping_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shopping_list_recipe ADD CONSTRAINT FK_C14F483F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shopping_list_row ADD CONSTRAINT FK_2BA6F0AB4F22EB9A FOREIGN KEY (shoppinglist_id) REFERENCES shopping_list (id)');
        $this->addSql('ALTER TABLE shopping_list_row ADD CONSTRAINT FK_2BA6F0AB933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shopping_list_recipe DROP FOREIGN KEY FK_C14F483F23245BF9');
        $this->addSql('ALTER TABLE shopping_list_row DROP FOREIGN KEY FK_2BA6F0AB4F22EB9A');
        $this->addSql('DROP TABLE shopping_list');
        $this->addSql('DROP TABLE shopping_list_recipe');
        $this->addSql('DROP TABLE shopping_list_row');
    }
}
