<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<h1>{{ $appiler_data['full_name'] }} apply for {{ $appiler_data['job_position'] }} position</h1>


<h3>{{ $appiler_data['full_name'] }} apply for {{ $appiler_data['job_position'] }} position
     here  he career information of {{ $appiler_data['full_name'] }}.</h3>

     <table class="table table-bordered">
        <tbody>
          <tr>
            <td>Qualification :-</td>
            <td>{{$appiler_data['qualification']}}</td>
          </tr>
          <tr>
            <td>Experience :-</td>
            <td>{{$appiler_data['experience_year']}} years</td>
          </tr>
          <tr>
            <td>Last Organization :-</td>
            <td>{{$appiler_data['last_organization']}}</td>
          </tr>
          <tr>
            <td>Last CTC :-</td>
            <td>{{$appiler_data['last_ctc']}} years</td>
          </tr>
          <tr>
            <td>Last Designation :-</td>
            <td>{{$appiler_data['last_designation']}} years</td>
          </tr>

        </tbody>
      </table>
