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