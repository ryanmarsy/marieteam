<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230503120944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommandation (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, text_recommandation VARCHAR(250) NOT NULL, INDEX IDX_C7782A28A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recommandation ADD CONSTRAINT FK_C7782A28A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE liaison ADD pays_id INT NOT NULL');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC37A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_225AC37A6E44244 ON liaison (pays_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC37A6E44244');
        $this->addSql('ALTER TABLE recommandation DROP FOREIGN KEY FK_C7782A28A6E44244');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE recommandation');
        $this->addSql('DROP INDEX IDX_225AC37A6E44244 ON liaison');
        $this->addSql('ALTER TABLE liaison DROP pays_id');
    }
}
