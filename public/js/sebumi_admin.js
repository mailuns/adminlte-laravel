function hapusdata(id) {
    console.log(id);
    var txt;
    var r = confirm('Anda yakin akan menghapus data ini ?');
    if (r == true) {
        window.location.href='/pulau/delete/'+id;
    }
}