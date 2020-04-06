<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>PHP Calculator</title>

<style>
p {
  font-size: 12px;
}
.alert {
  color: red;
}
</style>
</head>

<body>


<h2>OOP calculator</h2>
<br>
  <form action="calc.php" method="POST">
      <input type="text" name="num1Inserted">
      <input type="text" name="num2Inserted">
      <select name="calInserted">
        <option value="add">Add</option>
        <option value="sub">Subtract</option>
        <option value="mul">Multiply</option>
      </select>
      <button type="submit">Calculate</button>
  </form>


</body>

</html>