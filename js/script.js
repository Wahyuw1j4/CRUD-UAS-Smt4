function validateform() {
    var username = document.forms["login"]["username"];
    var password = document.forms["login"]["password"];
    var alr = document.getElementById("alr");
    let bool

    if (username.value.length < 1) {
        username.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }

    if (password.value.length < 1) {
        password.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    return bool
}

function validateformm() {
    var nama = document.forms["tambah"]["nama"];
    var jk = document.forms["tambah"]["jk"];
    var tl = document.forms["tambah"]["tl"];
    var tgll = document.forms["tambah"]["tgll"];
    var alamat = document.forms["tambah"]["alamat"];
    var prov = document.forms["tambah"]["prov"];
    var kota = document.forms["tambah"]["kota"];
    var camat = document.forms["tambah"]["camat"];
    var pos = document.forms["tambah"]["pos"];
    var nohp = document.forms["tambah"]["nohp"];
    var email = document.forms["tambah"]["email"];
    var alr = document.getElementById("alr");
    let bool


    if (nama.value.length < 1) {
        nama.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }

    if (jk.value.length < 1) {
        jk.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    if (tgll.value.length < 1) {
        tgll.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    if (tl.value.length < 1) {
        tl.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    if (alamat.value.length < 1) {
        alamat.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    if (prov.value.length < 1) {
        prov.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    if (kota.value.length < 1) {
        kota.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    if (camat.value.length < 1) {
        camat.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    if (pos.value.length < 1) {
        pos.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    if (nohp.value.length < 1) {
        nohp.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    if (email.value.length < 1) {
        email.classList.add("alertform");
        alr.classList.add("displaynone");
        bool = false
    }
    return bool
}