CREATE TABLE `users` (
  `id`       INT(11)                           NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(255)                               DEFAULT NULL,
  `gender`   ENUM ('nobody', 'female', 'male') NOT NULL DEFAULT 'nobody',
  `birthday` DATE                              NULL     DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `gender` (`gender`)
);
CREATE TABLE `phones` (
  `id`      INT(11)     NOT NULL AUTO_INCREMENT,
  `user_id` INT(11)     NOT NULL,
  `phone`   VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id` (`user_id`)
);

SET @gender = 'female';
SET @age_from = 18;
SET @age_to = 22;

SELECT
  users.name,
  COUNT(phones.phone)
FROM users
  LEFT OUTER JOIN phones ON phones.user_id = users.id
WHERE users.gender = @gender AND TIMESTAMPDIFF(YEAR, users.birthday, NOW()) BETWEEN @age_from AND @age_to
GROUP BY users.id;
-- Если нужно учитывать валидность указаной даты рождения в `WHERE` необходимо добавить users.birthday <= NOW()