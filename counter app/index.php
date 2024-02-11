<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Counter app</title>
</head>
<body>
    <h1>Student Counter:</h1>
    <h2 id="Counter">0</h2>
    <button class="btn btn-danger p5" onclick="increment()">INCREMENT</button>

    <button class="btn btn-primary p5" onclick="decrement()">DECREMENT</button>
      <br>
    <button class="btn btn-secondary mt3 R_btn" onclick="reset()">RESET</button>
    <br><br>
    <button class="btn btn-warning mt3 save_btn" onclick="save()">SAVE</button>

    <form id="saveForm" style="display:none;" method="post" action="save_count.php">
    <div class="input-group w-25 text-center">
      <label for="countName" class="input-group-text">Count Name:</label>
      <input type="text" id="countName" class="form-control" name="countName" required>
    </div>
      <br>
      <input type="hidden" id="savedCount" name="savedCount">
      <input type="hidden" id="savedCountName" name="savedCountName">
      <button type="button" class="btn btn-success mt3" onclick="submitSaveForm()">Submit</button>
      <input type="submit" id="saveFormSubmit" style="display:none;">
    </form>

    <div id="saveMessage"></div>

    <h3 id="saved-el">Previous Entries:</h3>

    <a href="login_form.php" class="btn btn-info mt3">Admin Login</a>

    <script src="script.js"></script>
  </body>
</html>