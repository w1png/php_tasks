<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
<?php 
        echo "<strong>Задачи</strong><br><br>#1<br>";
        $var = "hello";
        echo $var[0];
        echo $var[1];
        echo $var[-1];

        echo "<br><br>";

        echo "#2<br>";
        echo 60 * 60;

        echo "<br><br>";

        echo "#3<br>";
        $var = 1;
        $var += 12;
        $var -= 14;
        $var *= 5;
        $var /= 7;
        $var += 1;
        $var -= 1;
        echo $var;

        echo "<br><br>Работа с переменными<br><br>";

        echo "#1<br>";
        $a = 3;
        echo $a;

        echo "<br><br>";

        echo "#2<br>";
        $a = 10;
        $b = 3;
        echo $a + $b;

        echo "<br><br>";

        echo "#3<br>";
        $c = 15;
        $d = 2;
        $result = $c + $d;
        echo $result;

        echo "<br><br>";

        echo "#4<br>";
        $a = 10;
        $b = 2;
        $c = 5;
        echo $a + $b + $c;

        echo "#5<br>";
        $a = 17;
        $b = 10;
        $c = $a - $b;
        $d = 7;
        $result = $c + $d;
        echo $result;

        echo "<br><br>";

        echo "#6<br>";
        $text = "Привет, мир!";
        echo $text;

        echo "<br><br>";

        echo "#7<br>";
        $text1 = "Привет, ";
        $text2 = "мир!";
        echo $text1 . $text2;

        echo "<br><br>";

        echo "#8<br>";
        $name = "Нурбек";
        echo "Привет, " . $name . "!";

        echo "<br><br>";

        echo "#9<br>";
        $age = 45;
        echo "Мне " . $age . " лет.";

        echo "<br><br>";

        echo "#10<br>";
        $text = "abcde";
        echo $text[0];
        echo $text[2];
        echo $text[-1];

        echo "<br><br>";

        echo "#11<br>";
        $text = "abcde";
        $text[0] = "!";
        echo $text;

        echo "<br><br>";

        echo "#12<br>";
        $num = "12345";
        $sum = 0;
        for ($i = 0; $i < strlen($num); $i++) {
            $sum += $num[$i];
        }
        echo $sum;

      ?>
    </body>
</html>
