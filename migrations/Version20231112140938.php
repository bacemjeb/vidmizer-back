<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231112140938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE encoder (id INT AUTO_INCREMENT NOT NULL, video_id INT DEFAULT NULL, size DOUBLE PRECISION NOT NULL, quality VARCHAR(255) NOT NULL, INDEX IDX_2294D4D029C1004E (video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE folder (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, views INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE folder_video (folder_id INT NOT NULL, video_id INT NOT NULL, INDEX IDX_1103A1E1162CB942 (folder_id), INDEX IDX_1103A1E129C1004E (video_id), PRIMARY KEY(folder_id, video_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, duration INT NOT NULL, size DOUBLE PRECISION NOT NULL, quality VARCHAR(255) NOT NULL, views INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE encoder ADD CONSTRAINT FK_2294D4D029C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
        $this->addSql('ALTER TABLE folder_video ADD CONSTRAINT FK_1103A1E1162CB942 FOREIGN KEY (folder_id) REFERENCES folder (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE folder_video ADD CONSTRAINT FK_1103A1E129C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE encoder DROP FOREIGN KEY FK_2294D4D029C1004E');
        $this->addSql('ALTER TABLE folder_video DROP FOREIGN KEY FK_1103A1E1162CB942');
        $this->addSql('ALTER TABLE folder_video DROP FOREIGN KEY FK_1103A1E129C1004E');
        $this->addSql('DROP TABLE encoder');
        $this->addSql('DROP TABLE folder');
        $this->addSql('DROP TABLE folder_video');
        $this->addSql('DROP TABLE video');
    }
}
