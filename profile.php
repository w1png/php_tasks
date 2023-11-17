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

          if (!isset($_POST['login']) || !isset($_POST['password'])) {
            echo '<div class="flex flex-col items-center"><p class="text-red-400 text-3xl">Не все поля заполнены</p><a class="text-blue-400 hover:underline" href="registration.php">Вернуться назад</a></div>';
            return;
          }

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM users WHERE login = '" . $_POST['login'] . "'";
          $result = $conn->query($sql);

          if ($result->num_rows == 0) {
            echo '<div class="flex flex-col items-center"><p class="text-red-400 text-3xl">Пользователя с таким логином не существует</p><a class="text-blue-400 hover:underline" href="login.php">Вернуться назад</a></div>';
            return;
          }

          $user = $result->fetch_assoc();

          if (!password_verify($_POST['password'], $user['password_hash'])) {
            echo '<p class="text-red-400 text-3xl">Неверный пароль</p>';
            return;
          }

          echo '<div class="flex flex-col">';
          echo '<p class="text-3xl">Ваш профиль</p>';
          echo '<p class="text-xl">Логин: ' . $user['login'] . '</p>';
          echo '<p class="text-xl">Имя: ' . $user['name'] . '</p>';
          echo '<p class="text-xl">Фамилия: ' . $user['surname'] . '</p>';
          echo '<p class="text-xl">Отчество: ' . $user['patronymic'] . '</p>';
          echo '<a class="text-blue-400 hover:underline" href="login.php">Вернуться назад</a>';
          echo '</div>';

          $conn->close();
        ?>
      </div>
    </body>
</html>
