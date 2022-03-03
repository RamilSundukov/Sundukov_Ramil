<?php

class Connection
{
    public $hostname;
    public $username;
    public $password;
    public $dbname;
    public function __construct($hostname, $username, $password, $dbname){
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }
    public function db_con(){
        return  mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
    }
    public function select_autorisation(){
        $select=mysqli_query($this->db_con(), "SELECT * FROM `autorisation`");
        return mysqli_fetch_all($select, MYSQLI_ASSOC);
    }
    //Функция авторизации
    public function autorisation()
    {
        $log_pas = $this->select_autorisation();
        $_POST['password'] = md5($_POST['password']);
        $flag = false;
        foreach ($log_pas as $pair)
        {
            if (($pair['login'] == $_POST['login']) && ($pair['password'] == $_POST['password']) ){
                $_SESSION['user'] = $_POST['login'];
                $flag = true;
            }
        }
        if ($_POST['login'] != '' && $_POST['password'] != '') {
            if ($flag == true)
                echo '<br>' . 'Успешная авторизация!';
            else
                echo '<br>' . 'Вы ввели неверный логин или пароль!';
        }
    }
    //Функция регистрации
    function registration()
    {
        $log_pas = $this->select_autorisation();
        $_POST['password'] = md5($_POST['password']);
        $flag = false;
        foreach ($log_pas as $pair)
        {
            if ($pair['login'] == $_POST['login'])
                $flag = true;
        }
        if ($_POST['login'] != '' && $_POST['password'] != '') {
            if ($flag == true)
                echo '<br>' . 'Такой логин уже занят!';
            else {
                $l = $_POST['login'];
                $p = $_POST['password'];
                mysqli_query($this->db_con(), "INSERT INTO `autorisation`(`login`, `password`, `site`, `color`) VALUES ('$l','$p','site','white')");
                echo '<br>' . 'Успешная регистрация';
            }
        }
    }
    //Функция объединяет регистрацию и авторизацию
    public function aut_reg()
    {
        if($_POST['aut_reg'] == 1){
            $this->autorisation();
            echo "<meta http-equiv='refresh' content='0'>";
        }elseif($_POST['aut_reg'] == 2){
            $this->registration();;
            echo "<meta http-equiv='refresh' content='0'>";
        }elseif($_POST['aut_reg'] == 3){
            echo '<br>' . ' ';
            $_SESSION['user']='';
            echo "<meta http-equiv='refresh' content='0'>";
        }
        $_POST['aut_reg'] = 0;
    }
    //Функция определения номера пользователя
    public function user()
    {
        $log_pas = $this->select_autorisation();
        foreach ($log_pas as $pair) {
            $i++;
            if ($pair['login'] == $_SESSION['user'])
                return $i - 1;
        }
    }
    //Функция для вывода
    public function input()
    {
        $log_pas = $this->select_autorisation();
        if ($_SESSION['user']!='')
        echo '<br>' . $_SESSION['user'] . ' последний раз посетил: ' . $log_pas[$this->user()]['site'];
    }
    //Функция определения перехода по ссылке
    public function site()
    {
        $login = $_SESSION['user'];
        if ($_POST['site'] == 1) {
            mysqli_query($this->db_con(), "UPDATE `autorisation` SET `site`='Факт' WHERE `login`='$login'");
            $_POST['site'] = 0;
            header("Location: fact.php");
        }elseif ($_POST['site'] == 2){
            mysqli_query($this->db_con(), "UPDATE `autorisation` SET `site`='Битрикс' WHERE `login`='$login'");
            $_POST['site'] = 0;
            header("Location: bitrix.php");
        }
    }
    //Функция записи цвета
    public function color()
    {
        $login = $_SESSION['user'];
        if ($_POST['button_color'] == 1) {
            $c = $_POST['color'];
            mysqli_query($this->db_con(), "UPDATE `autorisation` SET `color`='$c' WHERE `login`='$login'");
            $_POST['button_color'] = 0;
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }
    //Функция определения цвета
    public function bg_color()
    {
        $log_pas = $this->select_autorisation();
        return $log_pas[$this->user()]['color'];
    }
}