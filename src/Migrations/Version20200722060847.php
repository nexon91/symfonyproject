<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722060847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, author VARCHAR(255) NOT NULL, comment LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employee CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE employee_office ADD CONSTRAINT FK_5D60AF978C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employee_office ADD CONSTRAINT FK_5D60AF97FFA0C224 FOREIGN KEY (office_id) REFERENCES office (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE comment');
        $this->addSql('ALTER TABLE employee MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE employee DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE employee CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE employee_office DROP FOREIGN KEY FK_5D60AF978C03F15C');
        $this->addSql('ALTER TABLE employee_office DROP FOREIGN KEY FK_5D60AF97FFA0C224');
    }
}
