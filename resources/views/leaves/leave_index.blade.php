<html>
    <head>
    <script>
        function editLeaveApplication(id)
        {
            window.location.href = '/leaves/' + id + '/edit' ;
        }
    </script>
    <style>
        table, th, td {
          border: 1px black;
          padding: 5px;
        }
    </style>
    </head>

    <body>
    <div>
        <table>
        <thead>
            <tr>
              <th>Start date</th>
              <th>End date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $applications as $application)
            <tr>
              <td> {{ $application->start_date }} </td>
              <td> {{ $application->end_date }}</td>
              <td> {{ $application->status  }} </td>
              <td> <button type="button" onclick="editLeaveApplication( {{ $application->id }} )"> Show </button> </td>
              <td>
                <form method='POST' action="/leaves/{{ $application->id }}">
                  @csrf
                  @method('DELETE') 
                <input type="submit" value="delete" />
                </form>
               </td>
            </tr>           
            @endforeach
        </tbody>
          </table> 
    <div>
      messages: {{ $messages ?? '' }}
      errors: {{ $errors }}
    </div>
    </div>
    </body>
</html>