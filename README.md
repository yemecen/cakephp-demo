# Cakephp Demo

## Products Table

```js
CREATE TABLE `products` (
	`id` INT(11) NOT NULL,
	`name` VARCHAR(200) NOT NULL COLLATE 'utf8_unicode_ci',
	`description` TEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`brandId` INT(11) NOT NULL,
	`brandName` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`categoryId` INT(11) NOT NULL,
	`categoryName` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`sku` VARCHAR(100) NOT NULL COLLATE 'utf8_unicode_ci',
	`stock` INT(11) NOT NULL,
	`tax` INT(11) NOT NULL,
	`category` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`image` VARCHAR(200) NOT NULL COLLATE 'utf8_unicode_ci',
	`price` DECIMAL(8,2) NOT NULL,
	`priceNot` VARCHAR(100) NOT NULL COLLATE 'utf8_unicode_ci',
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;

```
