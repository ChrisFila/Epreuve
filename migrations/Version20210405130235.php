<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210405130235 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte_rendu_medicament (compte_rendu_id INT NOT NULL, medicament_id INT NOT NULL, INDEX IDX_9D314D14BC44A10 (compte_rendu_id), INDEX IDX_9D314D1AB0D61F7 (medicament_id), PRIMARY KEY(compte_rendu_id, medicament_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte_rendu_medicament ADD CONSTRAINT FK_9D314D14BC44A10 FOREIGN KEY (compte_rendu_id) REFERENCES compte_rendu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte_rendu_medicament ADD CONSTRAINT FK_9D314D1AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte_rendu ADD praticien_id INT NOT NULL, ADD date_visite DATETIME NOT NULL, ADD motif VARCHAR(255) NOT NULL, ADD description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D22391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id)');
        $this->addSql('CREATE INDEX IDX_D39E69D22391866B ON compte_rendu (praticien_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE compte_rendu_medicament');
        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D22391866B');
        $this->addSql('DROP INDEX IDX_D39E69D22391866B ON compte_rendu');
        $this->addSql('ALTER TABLE compte_rendu DROP praticien_id, DROP date_visite, DROP motif, DROP description');
    }
}
