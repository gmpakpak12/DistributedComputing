<!-- create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>

<h1>Create Student</h1>

<form method="POST" action="{{ route('student.store') }}" id="my-student-form">
    @csrf

    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="student_id">Student ID:</label>
    <input type="text" id="student_id" name="student_id"><br><br>

    <label for="year_section">Year Section:</label>
    <input type="text" id="year_section" name="year_section"><br><br>

    <label for="course">Course:</label>
    <input type="text" id="course" name="course"><br><br>

    <input type="submit" value="Create">
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
    console.log('Ajax error:', jqxhr, settings, thrownError);
    if (jqxhr.status === 422) {
        var errorMessage = jqxhr.responseJSON.errors[Object.keys(jqxhr.responseJSON.errors)[0]][0];
        alert(errorMessage);
    }
});

$('#my-student-form').on('submit', function(e) {
    e.preventDefault();
    try {
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
                window.location.href = response.redirect;
            },
            error: function(jqxhr, textStatus, errorThrown) {
                if (jqxhr.status === 422) {
                    var errorMessage = jqxhr.responseJSON.errors[Object.keys(jqxhr.responseJSON.errors)[0]][0];
                    alert(errorMessage);
                }
            }
        });
    } catch (error) {
        console.log('Error:', error);
    }
});
</script>

</body>
</html>