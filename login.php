<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
      <div class="w-screen h-screen bg-[#282828] flex items-center justify-center text-[#fbf1c7]">
        <form action="profile.php" method="post" id="loginForm" class="w-1/2 flex flex-col gap-2 mx-auto" onsubmit="return validateForm(event)">
            <div class="flex flex-col">
              <label for="login" class="font-bold">Логин:</label>
              <input name="login" id="login" class="px-2 border-2 border-[#f38019] h-10 rounded-md bg-[#282828]" type="text" onchange="onChangeInput(event)">
            </div>

            <div class="flex flex-col">
              <label for="password" class="font-bold">Пароль:</label>
              <input name="password" id="password" class="px-2 border-2 border-[#f38019] h-10 rounded-md bg-[#282828]" type="password" onchange="onChangeInput(event)">
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

          var login = document.getElementById("login").value;
          var password = document.getElementById("password").value;

          let wasError = false;
          if (!login) {
            hightlightRed("login");
            wasError = true;
          }

          if (!password) {
            hightlightRed("password");
            wasError = true;
          }

          if (wasError) {
            changeErrorText("Не все поля заполнены");

            return;
          }

          document.getElementById("loginForm").submit();
        }
      </script>
    </body>
</html>
