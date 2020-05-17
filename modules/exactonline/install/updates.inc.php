<?php
$updates["201410011000"][]="CREATE TABLE IF NOT EXISTS `exact_project_templates` (
  `template_id` int(11) NOT NULL,
  `division_number` varchar(16) NOT NULL DEFAULT '',
  PRIMARY KEY `template_id` (`template_id`)
) ENGINE=InnoDB;";



$updates['201610281650'][] = 'SET foreign_key_checks = 0;';

$updates['201610281650'][] = 'ALTER TABLE `exact_project_templates` ENGINE=InnoDB;';
$updates['201610281650'][] = 'ALTER TABLE `exact_project_templates` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;';

$updates['201610281659'][] = 'SET foreign_key_checks = 1;';


$updates['201611280959'][] = "CREATE TABLE IF NOT EXISTS `exact_addressbook_addressbook` (
  `addressbook_id` int(11) NOT NULL,
  `division_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

$updates['201611280959'][] = "CREATE TABLE IF NOT EXISTS `exact_addressbook_companys` (
  `company_id` int(11) NOT NULL,
  `account_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";


$updates['201611280959'][] = "CREATE TABLE IF NOT EXISTS `exact_project2_income` (
  `income_id` int(11) NOT NULL,
  `invoice_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_fee` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";


$updates['201611280959'][] = "ALTER TABLE `exact_addressbook_addressbook`
  ADD PRIMARY KEY (`addressbook_id`),
  ADD UNIQUE KEY `addressbook_id` (`addressbook_id`);";

$updates['201611280959'][] = "ALTER TABLE `exact_addressbook_companys`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_id` (`company_id`);";

$updates['201709141437'][] = "ALTER TABLE `exact_project2_income` ADD PRIMARY KEY( `income_id`, `invoice_id`);";

$updates['201709141437'][] = "ALTER TABLE `exact_project2_income` CHANGE `open_fee` `open_fee` DOUBLE NOT NULL DEFAULT '0'";


$updates['201709141437'][] = "RENAME TABLE `exact_addressbook_companys` TO `exact_addressbook_companies`;";


$updates['201709141437'][] = "ALTER TABLE `exact_addressbook_companies` DROP INDEX `company_id`;";

$updates['201709141437'][] = "ALTER TABLE `exact_addressbook_companies` ADD `division_number` VARCHAR(100) NOT NULL DEFAULT '' AFTER `account_id`;";
$updates['201709141437'][] = "ALTER TABLE `exact_addressbook_companies`
  DROP PRIMARY KEY,
   ADD PRIMARY KEY(
     `company_id`,
     `account_id`,
     `division_number`);";



$updates['201709141437'][] = "CREATE TABLE `exact_addressbook_contacts` (
  `contact_id` int(11) NOT NULL,
  `account_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";


$updates['201709141437'][] = "ALTER TABLE `exact_addressbook_contacts`
  ADD PRIMARY KEY (`contact_id`,`account_id`,`division_number`);";


$updates['201811301700'][] = function() {
	$m = new go\modules\community\addressbook\install\Migrate63to64();
	$increment = $m->getCompanyIdIncrement();
	\go()->getDbConnection()->update('exact_addressbook_companies', [
			'company_id' => new \go\core\db\Expression('company_id + '.$increment)
			], 
					'company_id > 0 AND company_id IS NOT NULL')
					->execute();
};