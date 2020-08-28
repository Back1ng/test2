create database testovoe;

use testovoe;

create table manager (
    id BIGINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) UNIQUE NOT NULL
);

create table city (
    id BIGINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) UNIQUE NOT NULL
);

create table street (
    id BIGINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    city_id BIGINT,
    CONSTRAINT FOREIGN KEY (city_id) REFERENCES city (id) ON DELETE CASCADE ON UPDATE CASCADE,
    name VARCHAR(255) NOT NULL,
    UNIQUE(city_id, name)
);

create table address (
    id BIGINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    street_id BIGINT,
    CONSTRAINT FOREIGN KEY (street_id) REFERENCES street (id) ON DELETE CASCADE ON UPDATE CASCADE,
    house_number VARCHAR(10),
    UNIQUE(street_id, house_number)
);

create table partner_types_reference (
    id BIGINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) UNIQUE NOT NULL
);

create table partner (
    id BIGINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    type_id BIGINT,
    address_from_id BIGINT,
    address_to_id BIGINT,
    manager_id BIGINT,
    CONSTRAINT FOREIGN KEY (type_id) REFERENCES partner_types_reference (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (address_from_id) REFERENCES address (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (address_to_id) REFERENCES address (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (manager_id) REFERENCES manager (id) ON DELETE CASCADE ON UPDATE CASCADE
);