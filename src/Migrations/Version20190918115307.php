<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190918115307 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, paid_date DATE NOT NULL, paid TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice_product (id INT AUTO_INCREMENT NOT NULL, invoice_id_id INT DEFAULT NULL, product_id_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_2193327E429ECEE2 (invoice_id_id), INDEX IDX_2193327EDE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, tax_code_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, taxcode VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, code DOUBLE PRECISION NOT NULL, INDEX IDX_D34A04AD66925E1D (tax_code_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxcode (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice_product ADD CONSTRAINT FK_2193327E429ECEE2 FOREIGN KEY (invoice_id_id) REFERENCES invoice (id)');
        $this->addSql('ALTER TABLE invoice_product ADD CONSTRAINT FK_2193327EDE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD66925E1D FOREIGN KEY (tax_code_id) REFERENCES taxcode (id)');
        $this->addSql('ALTER TABLE fos_user ADD company_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE invoice_product DROP FOREIGN KEY FK_2193327E429ECEE2');
        $this->addSql('ALTER TABLE invoice_product DROP FOREIGN KEY FK_2193327EDE18E50B');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD66925E1D');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE invoice_product');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE taxcode');
        $this->addSql('ALTER TABLE fos_user DROP company_name');
    }
}
