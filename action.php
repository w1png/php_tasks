<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
      <div class="w-screen h-screen flex justify-center items-center bg-[#282828] text-[#fbf1c7]">
        <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "users";

          if (!isset($_POST['name']) || !isset($_POST['surname']) || !isset($_POST['patronymic']) || !isset($_POST['login']) || !isset($_POST['password'])) {
            echo '<div class="flex flex-col items-center"><p class="text-red-400 text-3xl">Не все поля заполнены</p><a class="text-blue-400 hover:underline" href="registration.php">Вернуться назад</a></div>';
            return;
          }

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM users WHERE login = '" . $_POST['login'] . "'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            echo '<p class="text-red-400 text-3xl">Пользователь с таким логином уже существует</p>';
            return;
          }

          $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

          $sql = "INSERT INTO users (name, surname, patronymic, login, password_hash) VALUES ('" . $_POST['name'] . "', '" . $_POST['surname'] . "', '" . $_POST['patronymic'] . "', '" . $_POST['login'] . "', '" . $hashed_password . "')";

          if ($conn->query($sql) === TRUE) {
            echo '<div class="flex flex-col items-center"><p class="text-3xl">Пользователь успешно добавлен</p><a class="hover:underline text-blue-500" href="login.php">Войти</a></div>';
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

          $conn->close();
        ?>
      </div>
    </body>
</html>
