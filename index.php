<?php
  $host = 'localhost'; // имя хоста
  $user = 'root';      // имя пользователя
  $pass = '';          // пароль
  $name = 'mydb';      // имя базы данных
  
  $link = mysqli_connect($host, $user, $pass, $name);
  
  $query = 'SELECT * FROM users';
  $res = mysqli_query($link, $query) or die(mysqli_error($link));
  var_dump($res);

  echo "<====================================>";

  for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);
  var_dump($data); // здесь будет массив с результатом

  #1
  echo "<====================================>";
  $firstEmployee = $data[0]['name'];
  echo $firstEmployee;
  #2
  echo "<====================================>";
  $secondEmployeeName = $data[1]['name'];
  $secondEmployeeAge = $data[1]['age'];
  echo $secondEmployeeName . ' ' . $secondEmployeeAge;
  #3
  echo "<====================================>";
  $thirdEmployeeName = $data[2]['name'];
  $thirdEmployeeAge = $data[2]['age'];
  $thirdEmployeeSalary = $data[2]['salary'];
  echo $thirdEmployeeName . ' ' . $thirdEmployeeAge . ' ' . $thirdEmployeeSalary;
  #1 выборка записей
  $query = "SELECT * FROM users WHERE id=3";
  #2
  $query = "SELECT * FROM users WHERE salary=900";
  #3
  $query = "SELECT * FROM users WHERE age=23";
  #4
  $query = "SELECT * FROM users WHERE salary>400";
  #5
  $query = "SELECT * FROM users WHERE salary>=500";
  #6
  $query = "SELECT * FROM users WHERE salary!=900";
  #7
  $query = "SELECT * FROM users WHERE salary<=900";

  #1 Логические операции
  $query = "SELECT * FROM users WHERE (age>25 AND age<=28)";
  #2
  $query = "SELECT * FROM users WHERE name='user1'";
  #3
  $query = "SELECT * FROM users WHERE name='user1' OR name='user2'";
  #4
  $query = "SELECT * FROM users WHERE name!='user3'";
  #5
  $query = "SELECT * FROM users WHERE salary=1000 OR age=27";
  #6
  $query = "SELECT * FROM users WHERE salary!=400 OR age=27";
  #7
  $query = "SELECT * FROM users WHERE (age>=23 AND age<27) OR salary=1000";
  #8
  $query = "SELECT * FROM users WHERE (age>=23 AND age<=27) OR (salary>=400 AND salary<=1000)";

  #1 Поля выборки
  $query = "SELECT name, age, salary FROM users";
  #2
  $query = "SELECT name FROM users";

  #1 Вставка записей
  //$query = "INSERT INTO users(id, name, age, salary) VALUES (7, 'user7', 26, 300)";
  //mysqli_query($link, $query) or die(mysqli_error($link));

  #1 Вставки при отсутствующих столбцах
  //$query = "INSERT INTO users(id, name) VALUES (8, 'xxxx')";
  //mysqli_query($link, $query) or die(mysqli_error($link));

  #1 Обновление записей
  //тут скип
  #2
  $query = "UPDATE users2 SET age=35 WHERE id=4";
  #3
  $query = "UPDATE users2 SET salary=700 WHERE salary=500";
  #4
  $query = "UPDATE users2 SET age=23 WHERE id>2 AND id<=5";

  #1 Удаление записей
  $query = "DELETE FROM users2 WHERE id=7";
  #2
  $query = "DELETE FROM users2 WHERE age=23";
  #3
  $query = "DELETE FROM users2 WHERE *";

  #1 Сортировка записей
  $query = "SELECT * FROM users ORDER BY salary";
  #2
  $query = "SELECT * FROM users ORDER BY salary DESC";
  #3
  $query = "SELECT * FROM users ORDER BY name";
  #4
  $query = "SELECT * FROM users WHERE salary = 500 ORDER BY age";
  #5
  $query = "SELECT * FROM users ORDER BY name AND salary";

  #1 Лимит записей
  $query = "SELECT * FROM users LIMIT 4";
  #2
  $query = "SELECT * FROM users LIMIT 2,3";
  #3
  $query = "SELECT * FROM users ORDER BY salary LIMIT 3";
  #4
  $query = "SELECT * FROM users ORDER BY salary DESC LIMIT 3";

  #1 Получение количества
  echo "<====================================>";
  $query = "SELECT COUNT(*) FROM users WHERE salary=300";
  $res = mysqli_query($link, $query) or die(mysqli_error($link));
  $data = mysqli_fetch_assoc($res);
  var_dump($data);
  #2
  echo "<====================================>";
  $query = "SELECT COUNT(*) FROM users WHERE salary=300 OR age=23";
  $res = mysqli_query($link, $query) or die(mysqli_error($link));
  $data = mysqli_fetch_assoc($res);
  var_dump($data);
?>