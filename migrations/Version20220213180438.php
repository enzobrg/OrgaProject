<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220213180438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE months_task (months_id INT NOT NULL, task_id INT NOT NULL, INDEX IDX_9006D1BC401C97F9 (months_id), INDEX IDX_9006D1BC8DB60186 (task_id), PRIMARY KEY(months_id, task_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE months_task ADD CONSTRAINT FK_9006D1BC401C97F9 FOREIGN KEY (months_id) REFERENCES months (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE months_task ADD CONSTRAINT FK_9006D1BC8DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE months_task');
        $this->addSql('ALTER TABLE months CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
