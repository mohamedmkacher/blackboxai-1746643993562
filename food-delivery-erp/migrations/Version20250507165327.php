<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250507165327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE menu_item (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, category VARCHAR(50) NOT NULL, image VARCHAR(255) DEFAULT NULL, is_available BOOLEAN NOT NULL, customization_options CLOB DEFAULT NULL, allergens CLOB DEFAULT NULL, preparation_time INTEGER DEFAULT NULL, average_rating NUMERIC(5, 2) DEFAULT NULL, total_ratings INTEGER DEFAULT 0 NOT NULL, is_spicy BOOLEAN NOT NULL, is_vegetarian BOOLEAN NOT NULL, is_vegan BOOLEAN NOT NULL, restaurant_id INTEGER NOT NULL, CONSTRAINT FK_D754D550B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D754D550B1E7706E ON menu_item (restaurant_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "order" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, order_date DATETIME NOT NULL, status VARCHAR(20) NOT NULL, subtotal NUMERIC(10, 2) NOT NULL, delivery_fee NUMERIC(10, 2) NOT NULL, discount NUMERIC(10, 2) DEFAULT NULL, total NUMERIC(10, 2) NOT NULL, delivery_address VARCHAR(255) NOT NULL, customer_phone VARCHAR(20) NOT NULL, special_instructions CLOB DEFAULT NULL, estimated_delivery_time DATETIME DEFAULT NULL, actual_delivery_time DATETIME DEFAULT NULL, order_items CLOB NOT NULL, payment_method VARCHAR(50) NOT NULL, payment_transaction_id VARCHAR(100) DEFAULT NULL, is_paid BOOLEAN NOT NULL, rating NUMERIC(2, 1) DEFAULT NULL, review CLOB DEFAULT NULL, customer_id INTEGER NOT NULL, restaurant_id INTEGER NOT NULL, delivery_driver_id INTEGER DEFAULT NULL, CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F5299398B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F52993988727759B FOREIGN KEY (delivery_driver_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F52993989395C3F3 ON "order" (customer_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F5299398B1E7706E ON "order" (restaurant_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F52993988727759B ON "order" (delivery_driver_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE restaurant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, phone_number VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, cuisine_types CLOB NOT NULL, operating_hours CLOB NOT NULL, is_active BOOLEAN NOT NULL, minimum_order_amount DOUBLE PRECISION NOT NULL, delivery_fee DOUBLE PRECISION NOT NULL, average_rating DOUBLE PRECISION DEFAULT NULL, total_ratings INTEGER DEFAULT 0 NOT NULL, owner_id INTEGER NOT NULL, CONSTRAINT FK_EB95123F7E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_EB95123F7E3C61F9 ON restaurant (owner_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_number VARCHAR(20) NOT NULL, address VARCHAR(255) NOT NULL, user_type VARCHAR(50) NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE menu_item
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "order"
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE restaurant
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "user"
        SQL);
    }
}
