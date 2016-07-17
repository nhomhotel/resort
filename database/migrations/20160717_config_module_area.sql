ALTER TABLE `tbl_address` ADD `area_id` INT NOT NULL AFTER `country_ascii`;
CREATE TABLE `tbl_area` (
  `area_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area_id`);
ALTER TABLE `tbl_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;
  ALTER TABLE `tbl_area` ADD `image` VARCHAR(255) NOT NULL AFTER `sort`;
