<html>
    <div>
    <form method="POST" action="/leaves" >
        @csrf
        <label for="start_date">Start date for your leave: </label>
        <input name="start_date" type="date" /> <br>
        <label for="end_date">End date for your leave: </label>
        <input name="end_date" type="date" /> <br>
        <label for="leave_type">Leave type: </label>
        <input name="leave_type" list="leave_types">
        
        <datalist id="leave-types">
            <option value="Casual">
            <option value="Medical">            
            <option value="Official">            
        </datalist>

        <label for="employee_id">employee ID: </label>
        <input name="employee_id" >
        <label for="contact_location">Contact Location: </label>
        <input name="contact_location">
        <br> <br>
        <label for="substitue_employee_id">substitue employee id: </label>
        <input name="substitue_employee_id">

        <br> <br>
        <input type="submit" />
    </form>
    <div>
       errors: {{ $errors }}
    </div>
    </div>
</html>