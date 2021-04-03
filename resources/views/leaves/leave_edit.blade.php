<html>
    <div>
    <form method="POST" action="/leaves/{{ $applications->id }}/" >
        @method("PUT")
        @csrf
        <label for="start_date">Start date for your leave: </label>
        <input name="start_date" type="date" value="{{ $applications->start_date }}"/> <br>
        <label for="end_date">End date for your leave: </label>
        <input name="end_date" type="date" value="{{ $applications->end_date }}" /> <br>
        <label for="leave_type">Leave type: </label>
        <input name="leave_type" list="leave_types" value="{{ $applications->type }}" />
        
        <datalist id="leave-types">
            <option value="Casual">
            <option value="Medical">            
            <option value="Official">            
        </datalist>

        <label for="employee_id">employee ID: </label>
        <input name="employee_id" value="{{ $applications->applicant_id }}" disabled>
        <label for="contact_location">Contact Location: </label>
        <input name="contact_location" value="{{ $applications->contact_location }}" >
        <br> <br>
        <label for="substitue_employee_id">substitue employee id: </label>
        <input name="substitue_employee_id" value="{{ $applications->substitute_employee_id }}" >

        <input type="submit" />
    </form>
    <div>
       messages: {{ $messages ?? '' }}
       errors: {{ $errors }}
    </div>
    </div>
</html>