<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200114145857 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE event_log (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, user_role VARCHAR(255) NOT NULL, date DATETIME NOT NULL, user_action VARCHAR(255) NOT NULL, data_version VARCHAR(255) NOT NULL, data_username VARCHAR(255) NOT NULL, data_year INTEGER NOT NULL, data_month INTEGER NOT NULL, data_done VARCHAR(1024) NOT NULL, data_comment VARCHAR(1024) DEFAULT NULL, data_extra VARCHAR(1024) DEFAULT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE event_log');
    }
}
