<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  text-align: right;
  color:white;
  width: 25%;
  padding: 5px;
  height: 300px; /* Should be removed. Only for demonstration */
  background-image: url("assets/images/block_bg.png");
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>

<h2>Four Equal Columns</h2>

<div class="row">
  <div class="column" style="background-color:#aaa;">
      <br><br>
    <h3>Europe 8 Days</h3>
    <p>Talk Time: 500 Minutes</p>
    <p>Validity: 8 Days</p>
    <p>Data: 5GB</p>
  <a href="#">  <img src="assets/images/buy_now.png"></img></a>
    <p>Recommended Plan</p>
  </div>
  <div class="column" style="background-color:#bbb;">
        <br><br>
    <h3>Europe 8 Days</h3>
    <p>Talk Time: 500 Minutes</p>
    <p>Validity: 8 Days</p>
    <p>Data: 5GB</p>
    <a href="#">  <img src="assets/images/buy_now.png"></img></a>
    <p>Recommended Plan</p>
  </div>
  <div class="column" style="background-color:#ccc;">
        <br><br>
    <h3>Europe 8 Days</h3>
    <p>Talk Time: 500 Minutes</p>
    <p>Validity: 8 Days</p>
    <p>Data: 5GB</p>
    <a href="#">  <img src="assets/images/buy_now.png"></img></a>
    <p>Recommended Plan</p>
  </div>
  <div class="column" style="background-color:#ddd;">
        <br><br>
    <h3>Europe 8 Days</h3>
    <p>Talk Time: 500 Minutes</p>
    <p>Validity: 8 Days</p>
    <p>Data: 5GB</p>
    <a href="#">  <img src="assets/images/buy_now.png"></img></a>
    <p>Recommended Plan</p>
  </div>
</div>

</body>
</html>