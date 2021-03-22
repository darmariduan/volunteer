// Remove alert welcome
$(document).ready(function () {
    $('.ui-pnotify.dark.ui-pnotify-fade-normal.ui-pnotify-move.ui-pnotify-in.ui-pnotify-fade-in').remove();
});


// Alert CRUD
const tipe = $('.flash-data').data('tipe');
const judul = $('.flash-data').data('judul');
const flashData = $('.flash-data').data('flashdata');
// Pnotify
if (tipe == 'Berhasil') {
    new PNotify({
        title: 'Berhasil',
        text: flashData,
        type: 'info',
        styling: 'bootstrap3'
    });
}
if (tipe == 'Gagal') {
    new PNotify({
        title: 'Gagal !',
        text: flashData,
        type: 'error',
        styling: 'bootstrap3'
    });
}


// Sweet Alert

// if (tipe == 'Berhasil') {
//     Swal.fire({
//         icon: 'success',
//         title: judul,
//         text: 'Berhasil ' + flashData,
//         type: 'success'
//     });
// }
// if (tipe == 'Gagal') {
//     Swal.fire({
//         icon: 'error',
//         title: 'Maaf',
//         text: 'Gagal ' + flashData
//     });
// }

// Tombol konfirm
$('.tombol-konfirm').on('click', function (e) {
    e.preventDefault();
    const link = $(this).attr('href');
    const judul = $(this).data('judul');
    const konfirm = $(this).data('konfirm');

    Swal.fire({
        title: 'Apakah anda yakin',
        text: judul,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: konfirm
    }).then((result) => {
        if (result.value) {
            document.location.href = link;
        }
    })
});