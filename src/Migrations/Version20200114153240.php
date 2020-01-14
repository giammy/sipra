<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200114153240 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE workflow (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, year INTEGER NOT NULL, month INTEGER NOT NULL, status INTEGER NOT NULL, note VARCHAR(1024) DEFAULT NULL, extra VARCHAR(1024) DEFAULT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_log AS SELECT id, username, user_role, date, user_action, data_version, data_username, data_year, data_month, data_done, data_comment, data_extra FROM event_log');
        $this->addSql('DROP TABLE event_log');
        $this->addSql('CREATE TABLE event_log (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL COLLATE BINARY, user_role VARCHAR(255) NOT NULL COLLATE BINARY, user_action VARCHAR(255) NOT NULL COLLATE BINARY, data_version VARCHAR(255) NOT NULL COLLATE BINARY, data_username VARCHAR(255) NOT NULL COLLATE BINARY, data_year INTEGER NOT NULL, data_month INTEGER NOT NULL, data_done VARCHAR(1024) NOT NULL COLLATE BINARY, data_comment VARCHAR(1024) DEFAULT NULL COLLATE BINARY, data_extra VARCHAR(1024) DEFAULT NULL COLLATE BINARY, date DATETIME NOT NULL)');
        $this->addSql('INSERT INTO event_log (id, username, user_role, date, user_action, data_version, data_username, data_year, data_month, data_done, data_comment, data_extra) SELECT id, username, user_role, date, user_action, data_version, data_username, data_year, data_month, data_done, data_comment, data_extra FROM __temp__event_log');
        $this->addSql('DROP TABLE __temp__event_log');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE workflow');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event_log AS SELECT id, username, user_role, date, user_action, data_version, data_username, data_year, data_month, data_done, data_comment, data_extra FROM event_log');
        $this->addSql('DROP TABLE event_log');
        $this->addSql('CREATE TABLE event_log (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) NOT NULL, user_role VARCHAR(255) NOT NULL, user_action VARCHAR(255) NOT NULL, data_version VARCHAR(255) NOT NULL, data_username VARCHAR(255) NOT NULL, data_year INTEGER NOT NULL, data_month INTEGER NOT NULL, data_done VARCHAR(1024) NOT NULL, data_comment VARCHAR(1024) DEFAULT NULL, data_extra VARCHAR(1024) DEFAULT NULL, date DATETIME NOT NULL)');
        $this->addSql('INSERT INTO event_log (id, username, user_role, date, user_action, data_version, data_username, data_year, data_month, data_done, data_comment, data_extra) SELECT id, username, user_role, date, user_action, data_version, data_username, data_year, data_month, data_done, data_comment, data_extra FROM __temp__event_log');
        $this->addSql('DROP TABLE __temp__event_log');
    }
}
