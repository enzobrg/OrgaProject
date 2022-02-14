<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220213175825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_months (task_id INT NOT NULL, months_id INT NOT NULL, INDEX IDX_C94A58FD8DB60186 (task_id), INDEX IDX_C94A58FD401C97F9 (months_id), PRIMARY KEY(task_id, months_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE task_months ADD CONSTRAINT FK_C94A58FD8DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_months ADD CONSTRAINT FK_C94A58FD401C97F9 FOREIGN KEY (months_id) REFERENCES months (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task_months DROP FOREIGN KEY FK_C94A58FD8DB60186');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE task_months');
        $this->addSql('ALTER TABLE months CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
