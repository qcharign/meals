<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211030071544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conversion (id INT AUTO_INCREMENT NOT NULL, start_unit_id INT NOT NULL, end_unit_id INT NOT NULL, coefficient DOUBLE PRECISION NOT NULL, intercept DOUBLE PRECISION NOT NULL, INDEX IDX_BD9127448782CDE (start_unit_id), INDEX IDX_BD9127446D7221E4 (end_unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, department_id INT NOT NULL, default_unit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, breakable_default_unit TINYINT(1) NOT NULL, INDEX IDX_6BAF7870AE80F5DF (department_id), INDEX IDX_6BAF7870A382148 (default_unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, people_number INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_row (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, ingredient_id INT NOT NULL, unit_id INT DEFAULT NULL, quantity DOUBLE PRECISION DEFAULT NULL, INDEX IDX_F567929759D8A214 (recipe_id), INDEX IDX_F5679297933FE08C (ingredient_id), INDEX IDX_F5679297F8BD700D (unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopping_list (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, locked TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopping_list_recipe (shopping_list_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_C14F483F23245BF9 (shopping_list_id), INDEX IDX_C14F483F59D8A214 (recipe_id), PRIMARY KEY(shopping_list_id, recipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopping_list_row (id INT AUTO_INCREMENT NOT NULL, shoppinglist_id INT NOT NULL, ingredient_id INT NOT NULL, bought TINYINT(1) NOT NULL, quantity DOUBLE PRECISION DEFAULT NULL, INDEX IDX_2BA6F0AB4F22EB9A (shoppinglist_id), INDEX IDX_2BA6F0AB933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conversion ADD CONSTRAINT FK_BD9127448782CDE FOREIGN KEY (start_unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE conversion ADD CONSTRAINT FK_BD9127446D7221E4 FOREIGN KEY (end_unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870A382148 FOREIGN KEY (default_unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE recipe_row ADD CONSTRAINT FK_F567929759D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE recipe_row ADD CONSTRAINT FK_F5679297933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE recipe_row ADD CONSTRAINT FK_F5679297F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE shopping_list_recipe ADD CONSTRAINT FK_C14F483F23245BF9 FOREIGN KEY (shopping_list_id) REFERENCES shopping_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shopping_list_recipe ADD CONSTRAINT FK_C14F483F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shopping_list_row ADD CONSTRAINT FK_2BA6F0AB4F22EB9A FOREIGN KEY (shoppinglist_id) REFERENCES shopping_list (id)');
        $this->addSql('ALTER TABLE shopping_list_row ADD CONSTRAINT FK_2BA6F0AB933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870AE80F5DF');
        $this->addSql('ALTER TABLE recipe_row DROP FOREIGN KEY FK_F5679297933FE08C');
        $this->addSql('ALTER TABLE shopping_list_row DROP FOREIGN KEY FK_2BA6F0AB933FE08C');
        $this->addSql('ALTER TABLE recipe_row DROP FOREIGN KEY FK_F567929759D8A214');
        $this->addSql('ALTER TABLE shopping_list_recipe DROP FOREIGN KEY FK_C14F483F59D8A214');
        $this->addSql('ALTER TABLE shopping_list_recipe DROP FOREIGN KEY FK_C14F483F23245BF9');
        $this->addSql('ALTER TABLE shopping_list_row DROP FOREIGN KEY FK_2BA6F0AB4F22EB9A');
        $this->addSql('ALTER TABLE conversion DROP FOREIGN KEY FK_BD9127448782CDE');
        $this->addSql('ALTER TABLE conversion DROP FOREIGN KEY FK_BD9127446D7221E4');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870A382148');
        $this->addSql('ALTER TABLE recipe_row DROP FOREIGN KEY FK_F5679297F8BD700D');
        $this->addSql('DROP TABLE conversion');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_row');
        $this->addSql('DROP TABLE shopping_list');
        $this->addSql('DROP TABLE shopping_list_recipe');
        $this->addSql('DROP TABLE shopping_list_row');
        $this->addSql('DROP TABLE unit');
    }
}
