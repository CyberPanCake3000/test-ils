Тестовое задание на должность PHP разработчика в компанию ILS

Стек: 
- PHP
- MySQL
- Nginx
- Docker

Инструкция:
- запустите контейнер в локальном окружении докера
- подправьте порты и все необходимые переменные в файле docker-compose.yml
- при подключении к базе данных импортировать туда таблицу deliveries (файл дампа лежит в корне) ИЛИ создать пустую таблицу в БД test_db этим запросом:
  - CREATE TABLE deliveries ( id BIGINT UNSIGNED PRIMARY KEY, weight DECIMAL(10, 2), source VARCHAR(100), destination VARCHAR(100), delivery_date DATE, price DECIMAL(10, 2), error VARCHAR(255) );
- наслаждаться! (ну или страдать)