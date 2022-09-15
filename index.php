<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>lab1</title>


  <link href="style.css" rel="stylesheet">
  <script defer src="validation.js"></script>
    <script defer src="canvasXOY.js"></script>
    <style>
        body {
            background-color: #02f;
        }
        #main_form {
            width: 1000px;
            margin: 0 auto;
        }
        h3 {
            color: white;
        }
        #result {
            width: 100%;
        }
        #result td {
            border-bottom: 1px solid black;
            text-align: center;
            cursor: pointer;
            color: white;
        }
        #result tr:hover {
            background-color: lightgrey;

        }
        #result tr:hover td{
            color: black;
        }
        #result th {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
  <div>
  <form id="main_form" action="" method="GET">
    <table class="core_table">
      <tr>
        <th>
          <div class="name">
            <h1>Насибуллин Алан</h1>
            <h2 class="var_and_group">группа 3232 <br> вариант 3211</h2>
          </div>
        </th>
        <th colspan=2 rowspan=2>
<!--          <img class="XOY" src="data/XOY.png">-->
            <div class="bordered canvasContainer">
                <canvas style="margin-left: 4.4%;" id="graph" width="350" height="350">
            <span>
              <img src="data/XOY.png" alt="Task grpah" width="350" height="350" />
            </span>
                </canvas>
            </div>
        </th>
      </tr>
	  <tr>
        <th>
          <a class="ling_to_github" href="https://github.com/lm-cyber">my github</a>
        </th>
      </tr>
      <tr id="id_params" class="params">
        <td>X</td>
        <td>Y</td>
        <td>R</td>
      </tr>
      <tr>
        <td>
          <p>
		    <select id="X" name="X">
              <option value="-2">-2</option>
              <option value="-1.5">-1.5</option>
              <option value="-1">-1</option>
              <option value="-0.5">-0.5</option>
              <option value="0">0</option>
              <option value="0.5">0.5</option>
              <option value="1">1</option>
              <option value="1.5">1.5</option>
              <option value="2">2</option>
            </select>
          </p>
        </td>
        <td>
          <input id="Y" name="Y" type="text" placeholder="(-3 , 3)">
        </td>
        <td>
          <input id="R" name="R" type="text" placeholder="(2 , 5)">
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <input id="butt" onclick="funcClick()" class="button" type="button" value="Send">
          <input id="butt1" onclick="window.location='?clear'"  style="float:right;" class="button" type="button" value="Clear">
        </td>
      </tr>
    </table>
  </form>
  </div>

  <?php
    session_start();
    if(isset($_GET['clear'])) {
	  unset($_SESSION['data']);
	  $data = [];
	} else {
        if (!isset($_SESSION['data'])) {
            $data = [];
        } else {
            $data = $_SESSION['data'];
        }
        if ((isset($_GET['X']) && isset($_GET['Y']) && isset($_GET['R']))) {
            require_once 'validation.php';
            if (valid($_GET['X'], $_GET['Y'], $_GET['R'])) {


                $curr_time = time();
                $start_time = microtime();

                $X = floatval($_GET['X']);
                $Y = floatval($_GET['Y']);
                $R = floatval($_GET['R']);


                $result = false;
                if ($X >= 0 && $Y >= 0 && $X <= $R && $Y <= $R / 2) $result = true;
                if ($X >= 0 && $Y <= 0 && sqrt($X * $X + $Y * $Y) <= $R) $result = true;
                if ($X <= 0 && $Y <= 0 && -$X / 2 - $R / 2 <= $Y) $result = true;
                $work_time = microtime() - $start_time;
                $data[] = [$X, $Y, $R, $result, $curr_time, $work_time];
                $_SESSION['data'] = $data;
            }
        }
    }
  ?>
  <h3>table of test:</h3>
  <table id="result">
	<tr>
	  <th>№</th>
	  <th>X</th>
	  <th>Y</th>
	  <th>R</th>
	  <th>Result</th>
	  <th>time now<br/>server</th>
	  <th>time work<br/>script</th>
	</tr>
  <?php
    $n = 1;
	foreach($data as $d) {
		echo "<tr>";
		echo "<td>$n</td><td>$d[0]</td><td>$d[1]</td><td>$d[2]</td>";
		echo "<td>" . ($d[3] ? "hit" : "miss") . "</td>";
		echo "<td>" . date('d.m.Y H:i:s', $d[4]) . "</td>";
		echo "<td>" . number_format($work_time, 6, ".", "") . "</td>";
		echo "</tr>";
		$n++;
	}
  ?>	
  </table>

</body>
</html>
