<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230503020639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipement_bateau (equipement_id INT NOT NULL, bateau_id INT NOT NULL, INDEX IDX_F0F14295806F0F5C (equipement_id), INDEX IDX_F0F14295A9706509 (bateau_id), PRIMARY KEY(equipement_id, bateau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipement_bateau ADD CONSTRAINT FK_F0F14295806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement_bateau ADD CONSTRAINT FK_F0F14295A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement_bateau DROP FOREIGN KEY FK_F0F14295806F0F5C');
        $this->addSql('ALTER TABLE equipement_bateau DROP FOREIGN KEY FK_F0F14295A9706509');
        $this->addSql('DROP TABLE equipement_bateau');
    }
}
