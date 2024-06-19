var check = function() {
    if (document.getElementById('password').value == document.getElementById('checkPassword').value) 
    {
        document.getElementById('alertPassword').style.color = 'green';
        document.getElementById('alertPassword').innerHTML = '<span style="color: green;"><i class="fa fa-check-circle"></i> Match !</span>';
        
        var button = document. getElementById('myButton').disabled = false; 
    } 
    else 
    {
        document.getElementById('alertPassword').style.color = '#EE2B39';
        document.getElementById('alertPassword').innerHTML = '<span style="color: red;"><i class="fa fa-exclamation-triangle"></i> Not matching</span>';
        var button = document. getElementById('myButton').disabled = true;
    }
}