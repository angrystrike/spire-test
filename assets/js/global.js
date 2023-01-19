'use strict';

$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })

function adderssSubmit() {
    alert('Hello !!!');
    //const xhttp = new XMLHttpRequest();
    //console.log('123123');
    // xhttp.onload = function() {
    //     document.getElementById("demo").innerHTML = this.responseText;
    // }
    // xhttp.open("GET", "ajax_info.txt", true);
    // xhttp.send();
}