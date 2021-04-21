<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>SEP Leave Application</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <div class="container">

        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
                Akuressa M M V Leave System
            </div>
            <div class="col-sm">
            </div>
        </div>

        <div class="row">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Full Name: {{$user[0]->full_name}}
                    </span>
                </div>
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Date Joined: {{$user[0]->date_joined}}
                    </span>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <td scope="col">Start Date</td>
                    <td scope="col">End Date</td>
                    <td scope="col">Leave Type</td>
                </tr>
            </thead>
            <tbody>
                @foreach($leaves as $leave)
                <tr>
                    <td scope="col">{{$leave->start_date}}</td>
                    <td scope="col">{{$leave->end_date}}</td>
                    <td scope="col">{{$leave->leave_type}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    
</body>

</html>