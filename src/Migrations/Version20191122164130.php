<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191122164130 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contextes_de_soin (id INT AUTO_INCREMENT NOT NULL, opinion_id INT DEFAULT NULL, probleme_id INT DEFAULT NULL, contexte_de_soin LONGTEXT NOT NULL, INDEX IDX_B685A9E151885A6A (opinion_id), INDEX IDX_B685A9E196784F9E (probleme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE efficacite_co (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, opinion_id INT DEFAULT NULL, risque INT NOT NULL, benefice INT NOT NULL, INDEX IDX_56C9EC56A76ED395 (user_id), INDEX IDX_56C9EC5651885A6A (opinion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE efficacite_me (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, opinion_id INT DEFAULT NULL, risque INT NOT NULL, benefice INT NOT NULL, INDEX IDX_289F28C6A76ED395 (user_id), INDEX IDX_289F28C651885A6A (opinion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE methodes_evaluation (id INT AUTO_INCREMENT NOT NULL, opinion_id INT DEFAULT NULL, probleme_id INT DEFAULT NULL, methode_evaluation LONGTEXT NOT NULL, INDEX IDX_50C94B51885A6A (opinion_id), INDEX IDX_50C94B96784F9E (probleme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modeles_de_soins (id INT AUTO_INCREMENT NOT NULL, opinion_id INT DEFAULT NULL, probleme_id INT DEFAULT NULL, modele_de_soin LONGTEXT NOT NULL, INDEX IDX_28515C2E51885A6A (opinion_id), INDEX IDX_28515C2E96784F9E (probleme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objectifs_de_soin (id INT AUTO_INCREMENT NOT NULL, opinion_id INT DEFAULT NULL, probleme_id INT DEFAULT NULL, objectif_de_soin LONGTEXT NOT NULL, INDEX IDX_70AC9B0351885A6A (opinion_id), INDEX IDX_70AC9B0396784F9E (probleme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objectifs_ethics (id INT AUTO_INCREMENT NOT NULL, opinion_id INT DEFAULT NULL, probleme_id INT DEFAULT NULL, objectif_ethics LONGTEXT NOT NULL, INDEX IDX_7243C11251885A6A (opinion_id), INDEX IDX_7243C11296784F9E (probleme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opinion (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, probleme_id INT DEFAULT NULL, description LONGTEXT NOT NULL, moyenne_risque INT NOT NULL, moyenne_benefice INT NOT NULL, flag_solution TINYINT(1) DEFAULT \'1\' NOT NULL, INDEX IDX_AB02B027A76ED395 (user_id), INDEX IDX_AB02B02796784F9E (probleme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE probleme (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date_mise_online DATETIME NOT NULL, fermer TINYINT(1) DEFAULT \'1\' NOT NULL, INDEX IDX_7AB2D714A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, roles_id INT DEFAULT NULL, pseudo VARCHAR(20) NOT NULL, email VARCHAR(60) NOT NULL, passwod VARCHAR(255) NOT NULL, date_inscription DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D64986CC499D (pseudo), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64938C751C4 (roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contextes_de_soin ADD CONSTRAINT FK_B685A9E151885A6A FOREIGN KEY (opinion_id) REFERENCES opinion (id)');
        $this->addSql('ALTER TABLE contextes_de_soin ADD CONSTRAINT FK_B685A9E196784F9E FOREIGN KEY (probleme_id) REFERENCES probleme (id)');
        $this->addSql('ALTER TABLE efficacite_co ADD CONSTRAINT FK_56C9EC56A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE efficacite_co ADD CONSTRAINT FK_56C9EC5651885A6A FOREIGN KEY (opinion_id) REFERENCES opinion (id)');
        $this->addSql('ALTER TABLE efficacite_me ADD CONSTRAINT FK_289F28C6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE efficacite_me ADD CONSTRAINT FK_289F28C651885A6A FOREIGN KEY (opinion_id) REFERENCES opinion (id)');
        $this->addSql('ALTER TABLE methodes_evaluation ADD CONSTRAINT FK_50C94B51885A6A FOREIGN KEY (opinion_id) REFERENCES opinion (id)');
        $this->addSql('ALTER TABLE methodes_evaluation ADD CONSTRAINT FK_50C94B96784F9E FOREIGN KEY (probleme_id) REFERENCES probleme (id)');
        $this->addSql('ALTER TABLE modeles_de_soins ADD CONSTRAINT FK_28515C2E51885A6A FOREIGN KEY (opinion_id) REFERENCES opinion (id)');
        $this->addSql('ALTER TABLE modeles_de_soins ADD CONSTRAINT FK_28515C2E96784F9E FOREIGN KEY (probleme_id) REFERENCES probleme (id)');
        $this->addSql('ALTER TABLE objectifs_de_soin ADD CONSTRAINT FK_70AC9B0351885A6A FOREIGN KEY (opinion_id) REFERENCES opinion (id)');
        $this->addSql('ALTER TABLE objectifs_de_soin ADD CONSTRAINT FK_70AC9B0396784F9E FOREIGN KEY (probleme_id) REFERENCES probleme (id)');
        $this->addSql('ALTER TABLE objectifs_ethics ADD CONSTRAINT FK_7243C11251885A6A FOREIGN KEY (opinion_id) REFERENCES opinion (id)');
        $this->addSql('ALTER TABLE objectifs_ethics ADD CONSTRAINT FK_7243C11296784F9E FOREIGN KEY (probleme_id) REFERENCES probleme (id)');
        $this->addSql('ALTER TABLE opinion ADD CONSTRAINT FK_AB02B027A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE opinion ADD CONSTRAINT FK_AB02B02796784F9E FOREIGN KEY (probleme_id) REFERENCES probleme (id)');
        $this->addSql('ALTER TABLE probleme ADD CONSTRAINT FK_7AB2D714A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64938C751C4 FOREIGN KEY (roles_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contextes_de_soin DROP FOREIGN KEY FK_B685A9E151885A6A');
        $this->addSql('ALTER TABLE efficacite_co DROP FOREIGN KEY FK_56C9EC5651885A6A');
        $this->addSql('ALTER TABLE efficacite_me DROP FOREIGN KEY FK_289F28C651885A6A');
        $this->addSql('ALTER TABLE methodes_evaluation DROP FOREIGN KEY FK_50C94B51885A6A');
        $this->addSql('ALTER TABLE modeles_de_soins DROP FOREIGN KEY FK_28515C2E51885A6A');
        $this->addSql('ALTER TABLE objectifs_de_soin DROP FOREIGN KEY FK_70AC9B0351885A6A');
        $this->addSql('ALTER TABLE objectifs_ethics DROP FOREIGN KEY FK_7243C11251885A6A');
        $this->addSql('ALTER TABLE contextes_de_soin DROP FOREIGN KEY FK_B685A9E196784F9E');
        $this->addSql('ALTER TABLE methodes_evaluation DROP FOREIGN KEY FK_50C94B96784F9E');
        $this->addSql('ALTER TABLE modeles_de_soins DROP FOREIGN KEY FK_28515C2E96784F9E');
        $this->addSql('ALTER TABLE objectifs_de_soin DROP FOREIGN KEY FK_70AC9B0396784F9E');
        $this->addSql('ALTER TABLE objectifs_ethics DROP FOREIGN KEY FK_7243C11296784F9E');
        $this->addSql('ALTER TABLE opinion DROP FOREIGN KEY FK_AB02B02796784F9E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64938C751C4');
        $this->addSql('ALTER TABLE efficacite_co DROP FOREIGN KEY FK_56C9EC56A76ED395');
        $this->addSql('ALTER TABLE efficacite_me DROP FOREIGN KEY FK_289F28C6A76ED395');
        $this->addSql('ALTER TABLE opinion DROP FOREIGN KEY FK_AB02B027A76ED395');
        $this->addSql('ALTER TABLE probleme DROP FOREIGN KEY FK_7AB2D714A76ED395');
        $this->addSql('DROP TABLE contextes_de_soin');
        $this->addSql('DROP TABLE efficacite_co');
        $this->addSql('DROP TABLE efficacite_me');
        $this->addSql('DROP TABLE methodes_evaluation');
        $this->addSql('DROP TABLE modeles_de_soins');
        $this->addSql('DROP TABLE objectifs_de_soin');
        $this->addSql('DROP TABLE objectifs_ethics');
        $this->addSql('DROP TABLE opinion');
        $this->addSql('DROP TABLE probleme');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
    }
}
