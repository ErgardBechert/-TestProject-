<?php


class Model_Main extends Model
{

    function get_banks()
    {
        $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');

        $query = "SELECT * FROM `Bank`";
        $stmt = $db->query($query);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    function get_promotions()
    {
        $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');

        // Выполнение SQL-запроса
        $query = "SELECT * FROM `Promotion`";
        $stmt = $db->query($query);

        // Получение данных
        $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data1;
    }

    function post_bank()
    {

        $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');

        $name = $_POST['name'];
        $interest_rate = $_POST['interest_rate'];
        $loan_term = $_POST['loan_term'];
        $monthly_payment = $_POST['monthly_payment'];


        // Обработка загрузки файлов
        $logo = 'media/promotion/' . basename($_FILES['logo']['name']);
        move_uploaded_file($_FILES['logo']['tmp_name'], $logo);


        $query = "INSERT INTO `products` (`id`, `title`, `price`, `description`) VALUES ('$logo', '$name', '$interest_rate', '$loan_term', '$monthly_payment')";
        $db->exec($query);
    }

}