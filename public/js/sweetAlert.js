// function Delete(){
    // Swal.fire({
    //     title: 'Are you sure?',
    //     text: "You won't be able to revert this!",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Yes, delete it!'
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //     Swal.fire(
    //         'Deleted!',
    //         'Your file has been deleted.',
    //         'success'
    //     )}
    // })
// }

$(document).on('click', '.btnIconoEliminar', function (e) {
    e.preventDefault();
    const href= $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
        document.location.href = href;
        // Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success',
        // )
        }
    })
})