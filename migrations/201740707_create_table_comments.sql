DROP TABLE IF EXISTS `sales_comments`;

CREATE TABLE `sales_comments` (
  `id`         int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `entity`     varchar(50) NOT NULL COMMENT 'Сущность',
  `entity_id`  int(11) NOT NULL COMMENT 'ID элемента',
  `parent_id`  int(11) COMMENT 'Родитель',
  `level`      SMALLINT DEFAULT 0 COMMENT 'Уровень',
  `content`    TEXT COMMENT 'Коментарий',

  `created_at` int(11) NOT NULL COMMENT 'Дата создания',
  `updated_at` int(11) NOT NULL COMMENT 'Дата изменения',

  `created_by` int(11) COMMENT 'Создал',
  `updated_by` int(11) COMMENT 'Изменил',
  `status`     SMALLINT NOT NULL DEFAULT 1 COMMENT 'Статус',

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
