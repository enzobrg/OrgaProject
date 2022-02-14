<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220213181607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE task_months (task_id INT NOT NULL, months_id INT NOT NULL, INDEX IDX_C94A58FD8DB60186 (task_id), INDEX IDX_C94A58FD401C97F9 (months_id), PRIMARY KEY(task_id, months_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE task_months ADD CONSTRAINT FK_C94A58FD8DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task_months ADD CONSTRAINT FK_C94A58FD401C97F9 FOREIGN KEY (months_id) REFERENCES months (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task ADD months_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25401C97F9 FOREIGN KEY (months_id) REFERENCES months (id)');
        $this->addSql('CREATE INDEX IDX_527EDB25401C97F9 ON task (months_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE task_months');
        $this->addSql('ALTER TABLE months CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25401C97F9');
        $this->addSql('DROP INDEX IDX_527EDB25401C97F9 ON task');
        $this->addSql('ALTER TABLE task DROP months_id');
    }
}
