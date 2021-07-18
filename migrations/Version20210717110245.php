<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210717110245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE concierto (id INT AUTO_INCREMENT NOT NULL, promotor_id INT NOT NULL, recinto_id INT NOT NULL, name VARCHAR(255) NOT NULL, numero_espectadores INT NOT NULL, fecha DATE NOT NULL, rentabilidad INT NOT NULL, INDEX IDX_86343F9C134AAD7 (promotor_id), INDEX IDX_86343F9C83618404 (recinto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grupo (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, cache INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grupo_concierto (grupo_id INT NOT NULL, concierto_id INT NOT NULL, INDEX IDX_6D72E49C9C833003 (grupo_id), INDEX IDX_6D72E49CEB225AAB (concierto_id), PRIMARY KEY(grupo_id, concierto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medio (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medio_concierto (medio_id INT NOT NULL, concierto_id INT NOT NULL, INDEX IDX_F122A714A40AA46 (medio_id), INDEX IDX_F122A714EB225AAB (concierto_id), PRIMARY KEY(medio_id, concierto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recinto (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, coste_alquiler INT NOT NULL, precio_entrada INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE concierto ADD CONSTRAINT FK_86343F9C134AAD7 FOREIGN KEY (promotor_id) REFERENCES promotor (id)');
        $this->addSql('ALTER TABLE concierto ADD CONSTRAINT FK_86343F9C83618404 FOREIGN KEY (recinto_id) REFERENCES recinto (id)');
        $this->addSql('ALTER TABLE grupo_concierto ADD CONSTRAINT FK_6D72E49C9C833003 FOREIGN KEY (grupo_id) REFERENCES grupo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE grupo_concierto ADD CONSTRAINT FK_6D72E49CEB225AAB FOREIGN KEY (concierto_id) REFERENCES concierto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medio_concierto ADD CONSTRAINT FK_F122A714A40AA46 FOREIGN KEY (medio_id) REFERENCES medio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medio_concierto ADD CONSTRAINT FK_F122A714EB225AAB FOREIGN KEY (concierto_id) REFERENCES concierto (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grupo_concierto DROP FOREIGN KEY FK_6D72E49CEB225AAB');
        $this->addSql('ALTER TABLE medio_concierto DROP FOREIGN KEY FK_F122A714EB225AAB');
        $this->addSql('ALTER TABLE grupo_concierto DROP FOREIGN KEY FK_6D72E49C9C833003');
        $this->addSql('ALTER TABLE medio_concierto DROP FOREIGN KEY FK_F122A714A40AA46');
        $this->addSql('ALTER TABLE concierto DROP FOREIGN KEY FK_86343F9C134AAD7');
        $this->addSql('ALTER TABLE concierto DROP FOREIGN KEY FK_86343F9C83618404');
        $this->addSql('DROP TABLE concierto');
        $this->addSql('DROP TABLE grupo');
        $this->addSql('DROP TABLE grupo_concierto');
        $this->addSql('DROP TABLE medio');
        $this->addSql('DROP TABLE medio_concierto');
        $this->addSql('DROP TABLE promotor');
        $this->addSql('DROP TABLE recinto');
    }
}
