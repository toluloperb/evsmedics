$(function() {
    $('#openmenu').click(function() {
        document.getElementById('mobilemenulist').style.display = 'flex';
        document.getElementById('closemenu').style.display = 'block';
        document.getElementById('openmenu').style.display = 'none';
    })

    $('#closemenu').click(function() {
        document.getElementById('mobilemenulist').style.display = 'none';
        document.getElementById('closemenu').style.display = 'none';
        document.getElementById('openmenu').style.display = 'block';
    })
});

// this is the id of the submit button
$("#how-it-works").click(function() {

    var url = "functions/indexfunc.php"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#idForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
                document.getElementById("examount").value = '$'+data;
           }
         });

    return false; // avoid to execute the actual submit of the form.
});