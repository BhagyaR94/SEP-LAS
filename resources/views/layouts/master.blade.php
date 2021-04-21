<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <title>SEP Leave Application</title>
</head>

<body style="background-color:maroon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
<script>
  $("#startdate, #enddate").on('change', function(event) {
    var startDate, endDate;
    startDate = document.getElementById("startdate").value
    endDate = document.getElementById("enddate").value;
    if (startDate && endDate) {
      $.ajax({
        url: "/loadAvailableResources",
        type: "GET",
        data: {
          start_date: startDate,
          end_date: endDate
        },
        success: function(response) {
          var select = document.getElementById("backupersonname");
          if (Array.isArray(response) && response.length > 0) {
            response.forEach(function(resp) {
              var option = document.createElement("option");
              option.text = resp.full_name;
              option.value = resp.id;
              select.add(option);
            })
          }
        },
      });
    }
  });
</script>

</html>