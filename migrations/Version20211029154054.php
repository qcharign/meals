<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029154054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conversion (id INT AUTO_INCREMENT NOT NULL, start_unit_id INT NOT NULL, end_unit_id INT NOT NULL, coefficient DOUBLE PRECISION NOT NULL, intercept DOUBLE PRECISION NOT NULL, INDEX IDX_BD9127448782CDE (start_unit_id), INDEX IDX_BD9127446D7221E4 (end_unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quantity (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_row (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, ingredient_id INT NOT NULL, unit_id INT DEFAULT NULL, quantity DOUBLE PRECISION DEFAULT NULL, INDEX IDX_F567929759D8A214 (recipe_id), INDEX IDX_F5679297933FE08C (ingredient_id), INDEX IDX_F5679297F8BD700D (unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conversion ADD CONSTRAINT FK_BD9127448782CDE FOREIGN KEY (start_unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE conversion ADD CONSTRAINT FK_BD9127446D7221E4 FOREIGN KEY (end_unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE recipe_row ADD CONSTRAINT FK_F567929759D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE recipe_row ADD CONSTRAINT FK_F5679297933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE recipe_row ADD CONSTRAINT FK_F5679297F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('DROP TABLE recipe_ingredient');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conversion DROP FOREIGN KEY FK_BD9127448782CDE');
        $this->addSql('ALTER TABLE conversion DROP FOREIGN KEY FK_BD9127446D7221E4');
        $this->addSql('ALTER TABLE recipe_row DROP FOREIGN KEY FK_F5679297F8BD700D');
        $this->addSql('CREATE TABLE recipe_ingredient (recipe_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_22D1FE1359D8A214 (recipe_id), INDEX IDX_22D1FE13933FE08C (ingredient_id), PRIMARY KEY(recipe_id, ingredient_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT FK_22D1FE1359D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT FK_22D1FE13933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE conversion');
        $this->addSql('DROP TABLE quantity');
        $this->addSql('DROP TABLE recipe_row');
        $this->addSql('DROP TABLE unit');
    }
}
