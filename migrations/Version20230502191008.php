<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230502191008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prix (id INT AUTO_INCREMENT NOT NULL, traversee_id INT NOT NULL, categorie_id INT NOT NULL, prix NUMERIC(10, 2) NOT NULL, INDEX IDX_F7EFEA5EED2BB15B (traversee_id), INDEX IDX_F7EFEA5EBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_categorie (id INT AUTO_INCREMENT NOT NULL, reservation_id INT NOT NULL, categorie_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_533AB7ABB83297E7 (reservation_id), INDEX IDX_533AB7ABBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT FK_F7EFEA5EED2BB15B FOREIGN KEY (traversee_id) REFERENCES traversee (id)');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT FK_F7EFEA5EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE reservation_categorie ADD CONSTRAINT FK_533AB7ABB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE reservation_categorie ADD CONSTRAINT FK_533AB7ABBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY FK_F7EFEA5EED2BB15B');
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY FK_F7EFEA5EBCF5E72D');
        $this->addSql('ALTER TABLE reservation_categorie DROP FOREIGN KEY FK_533AB7ABB83297E7');
        $this->addSql('ALTER TABLE reservation_categorie DROP FOREIGN KEY FK_533AB7ABBCF5E72D');
        $this->addSql('DROP TABLE prix');
        $this->addSql('DROP TABLE reservation_categorie');
    }
}
