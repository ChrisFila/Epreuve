<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407175053 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte_rendu (id INT AUTO_INCREMENT NOT NULL, praticien_id INT NOT NULL, date_visite DATETIME NOT NULL, motif VARCHAR(255) NOT NULL, bilan LONGTEXT NOT NULL, INDEX IDX_D39E69D22391866B (praticien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicament (id INT AUTO_INCREMENT NOT NULL, nom_commercial VARCHAR(255) NOT NULL, composition VARCHAR(255) NOT NULL, effets VARCHAR(255) NOT NULL, contre_indications VARCHAR(255) NOT NULL, prix_echantillon INT NOT NULL, famille VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE praticien (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(16) NOT NULL, ville VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presentation (id INT AUTO_INCREMENT NOT NULL, medicament_id INT NOT NULL, compte_rendu_id INT NOT NULL, quantite_offerte INT NOT NULL, INDEX IDX_9B66E893AB0D61F7 (medicament_id), INDEX IDX_9B66E8934BC44A10 (compte_rendu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, date_embauche DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D22391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id)');
        $this->addSql('ALTER TABLE presentation ADD CONSTRAINT FK_9B66E893AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE presentation ADD CONSTRAINT FK_9B66E8934BC44A10 FOREIGN KEY (compte_rendu_id) REFERENCES compte_rendu (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE presentation DROP FOREIGN KEY FK_9B66E8934BC44A10');
        $this->addSql('ALTER TABLE presentation DROP FOREIGN KEY FK_9B66E893AB0D61F7');
        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D22391866B');
        $this->addSql('DROP TABLE compte_rendu');
        $this->addSql('DROP TABLE medicament');
        $this->addSql('DROP TABLE praticien');
        $this->addSql('DROP TABLE presentation');
        $this->addSql('DROP TABLE user');
    }
}
