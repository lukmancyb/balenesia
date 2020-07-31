"use strict";
function showAlert(msg = String, flag = String, judul = String, duration) {
    swal({
        title: judul,
        text: msg,
        icon: flag,
        timer: duration
    });

}