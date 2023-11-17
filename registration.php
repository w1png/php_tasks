<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
      <div class="w-screen h-screen bg-[#282828] flex items-center justify-center text-[#fbf1c7]">
        <form action="action.php" method="post" id="registrationForm" class="w-1/2 flex flex-col gap-2 mx-auto" onsubmit="return validateForm(event)">
            <div class="flex flex-col">
              <label for="name" class="font-bold">Имя:</label>
              <input name="name" id="name" class="px-2 border-2 border-[#f38019] h-10 rounded-md bg-[#282828]" type="text" onchange="onChangeInput(event)">
            </div>

            <div class="flex flex-col">
              <label for="surname" class="font-bold">Фамилия:</label>
              <input name="surname" id="surname" class="px-2 border-2 border-[#f38019] h-10 rounded-md bg-[#282828]" type="text" onchange="onChangeInput(event)">
            </div>

            <div class="flex flex-col">
              <label for="patronymic" class="font-bold">Отчество:</label>
              <input name="patronymic" id="patronymic" class="px-2 border-2 border-[#f38019] h-10 rounded-md bg-[#282828]" type="text" onchange="onChangeInput(event)">
            </div>

            <div class="flex flex-col">
              <label for="login" class="font-bold">Логин:</label>
              <input name="login" id="login" class="px-2 border-2 border-[#f38019] h-10 rounded-md bg-[#282828]" type="text" onchange="onChangeInput(event)">
            </div>

            <div class="flex flex-col">
              <label for="password" class="font-bold">Пароль:</label>
              <input name="password" id="password" class="px-2 border-2 border-[#f38019] h-10 rounded-md bg-[#282828]" type="password" onchange="onChangeInput(event)">
            </div>

            <div class="flex flex-col">
              <label for="repeat_password" class="font-bold">Повтор пароля:</label>
              <input name="repeat_password" id="repeat_password" class="px-2 border-2 border-[#f38019] h-10 rounded-md bg-[#282828]" type="password" onchange="onChangeInput(event)">
            </div>

            <div class="flex flex-row items-center h-4 gap-2">
              <label for="rules" class="font-bold">Я согласен с правилами жиес:</label>
              <input name="rules" id="rules" type="checkbox" class="aspect-square h-full" onchange="onChangeInput(event)"/>
            </div>

            <p class="text-sm text-red-400" id="errorText"></p>

            <button type="submit" class="h-10 w-full bg-[#f38019] hover:bg-[#f38019]/80 rounded-md">Зарегистрироваться</button>
        </form>
      </div>

      <script>
        function changeErrorText(s) {
          document.getElementById("errorText").innerHTML = s;
        }

        function hightlightRed(id) {
          document.getElementById(id).classList.add("border-red-400");
        }

        function removeHightlightRed(id) {
          document.getElementById(id).classList.remove("border-red-400");
        }

        function onChangeInput(event) {
          removeHightlightRed(event.target.id);
          changeErrorText("");
        }

        function validateForm(event) {
          event.preventDefault();

          var name = document.getElementById("name").value;
          var surname = document.getElementById("surname").value;
          var patronymic = document.getElementById("patronymic").value;
          var login = document.getElementById("login").value;
          var password = document.getElementById("password").value;
          var password_repeat = document.getElementById("repeat_password").value;
          var rules = document.getElementById("rules").checked;

          let wasError = false;

          if (!name) {
            hightlightRed("name");
            wasError = true;
          }

          if (!surname) {
            hightlightRed("surname");
            wasError = true;
          }

          if (!patronymic) {
            hightlightRed("patronymic");
            wasError = true;
          }

          if (!login) {
            hightlightRed("login");
            wasError = true;
          }

          if (!password) {
            hightlightRed("password");
            wasError = true;
          }

          if (!password_repeat) {
            hightlightRed("repeat_password");
            wasError = true;
          }

          if (wasError) {
            changeErrorText("Не все поля заполнены");

            return;
          }

          if (password != password_repeat) {
            hightlightRed("repeat_password");
            changeErrorText("Пароли не совпадают");

            return;
          }

          if (!rules) {
            hightlightRed("rules");
            changeErrorText("Необходимо согласиться с правилами");
            return;
          }

          document.getElementById("registrationForm").submit();
        }
      </script>
    </body>
</html>
