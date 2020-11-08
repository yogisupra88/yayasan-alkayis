$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": true
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "order": [
            [3, "asc"]
        ]

    });
});