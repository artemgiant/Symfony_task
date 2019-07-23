<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190722152627 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE developer (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_65FB8B9AE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE progect (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE progect_developer (progect_id INT NOT NULL, developer_id INT NOT NULL, INDEX IDX_C33DBE1677BA7E5C (progect_id), INDEX IDX_C33DBE1664DD9267 (developer_id), PRIMARY KEY(progect_id, developer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE progect_developer ADD CONSTRAINT FK_C33DBE1677BA7E5C FOREIGN KEY (progect_id) REFERENCES progect (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE progect_developer ADD CONSTRAINT FK_C33DBE1664DD9267 FOREIGN KEY (developer_id) REFERENCES developer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE progect_developer DROP FOREIGN KEY FK_C33DBE1664DD9267');
        $this->addSql('ALTER TABLE progect_developer DROP FOREIGN KEY FK_C33DBE1677BA7E5C');
        $this->addSql('DROP TABLE developer');
        $this->addSql('DROP TABLE progect');
        $this->addSql('DROP TABLE progect_developer');
    }
}
