<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<< HEAD:migrations/Version20210408142248.php
final class Version20210408142248 extends AbstractMigration
=======
<<<<<<< HEAD:migrations/Version20210408133814.php
final class Version20210408133814 extends AbstractMigration
=======
final class Version20210408123815 extends AbstractMigration
>>>>>>> be4f1bef190e41f9a51deb2f5e7db6797737c455:migrations/Version20210408123815.php
>>>>>>> 264289b9e5baefa19b1f4334fd381faab1db74f7:migrations/Version20210408123815.php
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, jeu_id INT NOT NULL, plateforme_id INT NOT NULL, user_id INT NOT NULL, prix DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, boite TINYINT(1) NOT NULL, INDEX IDX_F65593E58C9E392E (jeu_id), INDEX IDX_F65593E5391E226B (plateforme_id), INDEX IDX_F65593E5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date_sortie DATETIME NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu_plateforme (jeu_id INT NOT NULL, plateforme_id INT NOT NULL, INDEX IDX_14AAFE598C9E392E (jeu_id), INDEX IDX_14AAFE59391E226B (plateforme_id), PRIMARY KEY(jeu_id, plateforme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateforme (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, pseudo VARCHAR(50) NOT NULL, num INT DEFAULT NULL, age INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E58C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE jeu_plateforme ADD CONSTRAINT FK_14AAFE598C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeu_plateforme ADD CONSTRAINT FK_14AAFE59391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E58C9E392E');
        $this->addSql('ALTER TABLE jeu_plateforme DROP FOREIGN KEY FK_14AAFE598C9E392E');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5391E226B');
        $this->addSql('ALTER TABLE jeu_plateforme DROP FOREIGN KEY FK_14AAFE59391E226B');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A76ED395');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE jeu');
        $this->addSql('DROP TABLE jeu_plateforme');
        $this->addSql('DROP TABLE plateforme');
        $this->addSql('DROP TABLE user');
    }
}
