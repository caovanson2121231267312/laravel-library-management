$(document).ready(function() {
    $("#listUsers").DataTable({
        "columnDefs": [
            { "width": "20px", "targets": 0 },
            { "width": "100px", "targets": 1 },
            { "width": "100px", "targets": 2 },
            { "width": "100px", "targets": 3 },
            { "width": "70px", "targets": 4, "orderable": false },
            { "width": "70px", "targets": 5, "orderable": false },
        ],
    });

    $('#editUser').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var email = button.data('email');
        var phone = button.data('phone');
        var modal = $(this);

        modal.find('.modal-body .id').val(id);
        modal.find('.modal-body .name').val(name);
        modal.find('.modal-body .email').val(email);
        modal.find('.modal-body .phone').val(phone);
    });

    $("#listPublishers").DataTable({
        "columnDefs": [
            { "width": "20px", "targets": 0 },
            { "width": "100px", "targets": 1 },
            { "width": "100px", "targets": 2 },
            { "width": "100px", "targets": 3 },
            { "width": "70px", "targets": 4, "orderable": false },
            { "width": "70px", "targets": 5, "orderable": false },
        ],
    });

    $('#editPublisher').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var id = button.data('id');
        var name = button.attr('data-name');
        var email = button.data('email');
        var address = button.data('address');
        var modal = $(this);

        modal.find('.modal-body .id').val(id);
        modal.find('.modal-body .name').val(name);
        modal.find('.modal-body .email').val(email);
        modal.find('.modal-body .address').val(address);
    });

    $("#listAuthors").DataTable({
        "columnDefs": [
            { "width": "20px", "targets": 0 },
            { "width": "100px", "targets": 1 },
            { "width": "100px", "targets": 2 },
            { "width": "200px", "targets": 3 },
            { "width": "100px", "targets": 4, "orderable": false },
            { "width": "70px", "targets": 5, "orderable": false },
            { "width": "70px", "targets": 6, "orderable": false },
        ],
    });

    $('#editAuthor').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var id = button.data('id');
        var name = button.attr('data-name');
        var email = button.data('email');
        var description = button.data('description');
        var modal = $(this);

        modal.find('.modal-body .id').val(id);
        modal.find('.modal-body .name').val(name);
        modal.find('.modal-body .email').val(email);
        modal.find('.modal-body .description').val(description);
    });
});
