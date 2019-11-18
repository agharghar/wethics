<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191117153313 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, rating_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, flag_solution TINYINT(1) DEFAULT NULL, moyenne_benefice SMALLINT NOT NULL, moyenne_risque SMALLINT NOT NULL, objectif_de_soins LONGTEXT DEFAULT NULL, objectif_ethiques LONGTEXT DEFAULT NULL, modeles_de_soins LONGTEXT DEFAULT NULL, contectes_de_soin LONGTEXT DEFAULT NULL, methode_evaluation LONGTEXT DEFAULT NULL, date_mise_en_ligne DATETIME NOT NULL, INDEX IDX_67F068BCA32EFC6 (rating_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contextes_de_soin (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, contexte_de_soin LONGTEXT NOT NULL, INDEX IDX_B685A9E14B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documents (id INT AUTO_INCREMENT NOT NULL, professionnel_id INT DEFAULT NULL, ref VARCHAR(255) DEFAULT NULL, INDEX IDX_A2B072888A49CC82 (professionnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE methodes_evaluation (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, methode_evaluation LONGTEXT NOT NULL, INDEX IDX_50C94B4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modeles_de_soin (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, modele_de_soin LONGTEXT NOT NULL, INDEX IDX_5C8EC06D4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objectifs_de_soin (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, objectif_de_soin LONGTEXT NOT NULL, INDEX IDX_70AC9B034B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objectifs_ethiques (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, objectif_ethique LONGTEXT NOT NULL, INDEX IDX_FA55BE8B4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, commentaires_id INT DEFAULT NULL, roles_id INT DEFAULT NULL, titre LONGTEXT NOT NULL, description LONGTEXT NOT NULL, date_mise_en_ligne DATETIME NOT NULL, fermer TINYINT(1) NOT NULL, INDEX IDX_5A8A6C8D17C4B2B0 (commentaires_id), INDEX IDX_5A8A6C8D38C751C4 (roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionel (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, verifier TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_D7D9B6AEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating_user (id INT AUTO_INCREMENT NOT NULL, risque SMALLINT NOT NULL, benefice SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, rating_id INT DEFAULT NULL, roles_id INT NOT NULL, commentaires_id INT DEFAULT NULL, posts_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, tel VARCHAR(255) NOT NULL, date_inscription DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649A32EFC6 (rating_id), INDEX IDX_8D93D64938C751C4 (roles_id), INDEX IDX_8D93D64917C4B2B0 (commentaires_id), INDEX IDX_8D93D649D5E258C5 (posts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA32EFC6 FOREIGN KEY (rating_id) REFERENCES rating_user (id)');
        $this->addSql('ALTER TABLE contextes_de_soin ADD CONSTRAINT FK_B685A9E14B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE documents ADD CONSTRAINT FK_A2B072888A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionel (id)');
        $this->addSql('ALTER TABLE methodes_evaluation ADD CONSTRAINT FK_50C94B4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE modeles_de_soin ADD CONSTRAINT FK_5C8EC06D4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE objectifs_de_soin ADD CONSTRAINT FK_70AC9B034B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE objectifs_ethiques ADD CONSTRAINT FK_FA55BE8B4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D17C4B2B0 FOREIGN KEY (commentaires_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D38C751C4 FOREIGN KEY (roles_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE professionel ADD CONSTRAINT FK_D7D9B6AEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A32EFC6 FOREIGN KEY (rating_id) REFERENCES rating_user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64938C751C4 FOREIGN KEY (roles_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64917C4B2B0 FOREIGN KEY (commentaires_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D5E258C5 FOREIGN KEY (posts_id) REFERENCES post (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D38C751C4');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64938C751C4');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D17C4B2B0');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64917C4B2B0');
        $this->addSql('ALTER TABLE contextes_de_soin DROP FOREIGN KEY FK_B685A9E14B89032C');
        $this->addSql('ALTER TABLE methodes_evaluation DROP FOREIGN KEY FK_50C94B4B89032C');
        $this->addSql('ALTER TABLE modeles_de_soin DROP FOREIGN KEY FK_5C8EC06D4B89032C');
        $this->addSql('ALTER TABLE objectifs_de_soin DROP FOREIGN KEY FK_70AC9B034B89032C');
        $this->addSql('ALTER TABLE objectifs_ethiques DROP FOREIGN KEY FK_FA55BE8B4B89032C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D5E258C5');
        $this->addSql('ALTER TABLE documents DROP FOREIGN KEY FK_A2B072888A49CC82');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA32EFC6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A32EFC6');
        $this->addSql('ALTER TABLE professionel DROP FOREIGN KEY FK_D7D9B6AEA76ED395');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE contextes_de_soin');
        $this->addSql('DROP TABLE documents');
        $this->addSql('DROP TABLE methodes_evaluation');
        $this->addSql('DROP TABLE modeles_de_soin');
        $this->addSql('DROP TABLE objectifs_de_soin');
        $this->addSql('DROP TABLE objectifs_ethiques');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE professionel');
        $this->addSql('DROP TABLE rating_user');
        $this->addSql('DROP TABLE user');
    }
}
