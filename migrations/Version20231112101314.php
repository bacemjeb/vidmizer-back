<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231112101314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE encoder (id INT AUTO_INCREMENT NOT NULL, video_id INT DEFAULT NULL, size INT NOT NULL, quality VARCHAR(255) NOT NULL, INDEX IDX_2294D4D029C1004E (video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE folder (id INT AUTO_INCREMENT NOT NULL, video_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_ECA209CD29C1004E (video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, duration INT NOT NULL, size INT NOT NULL, video_quality VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE encoder ADD CONSTRAINT FK_2294D4D029C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
        $this->addSql('ALTER TABLE folder ADD CONSTRAINT FK_ECA209CD29C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE encoder DROP FOREIGN KEY FK_2294D4D029C1004E');
        $this->addSql('ALTER TABLE folder DROP FOREIGN KEY FK_ECA209CD29C1004E');
        $this->addSql('DROP TABLE encoder');
        $this->addSql('DROP TABLE folder');
        $this->addSql('DROP TABLE video');
    }
}
