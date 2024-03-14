<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240314115732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tv_series (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, channel VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE tv_series_intervals (id INT AUTO_INCREMENT NOT NULL, week_day SMALLINT NOT NULL, show_time TIME NOT NULL, tv_series_id INT NOT NULL, INDEX IDX_6BD92DAAB6601CA3 (tv_series_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tv_series_intervals ADD CONSTRAINT FK_6BD92DAAB6601CA3 FOREIGN KEY (tv_series_id) REFERENCES tv_series (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tv_series_intervals DROP FOREIGN KEY FK_6BD92DAAB6601CA3');
        $this->addSql('DROP TABLE tv_series');
        $this->addSql('DROP TABLE tv_series_intervals');
    }
}
