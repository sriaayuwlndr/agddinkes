<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; web programming <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('custom-file-label').addClass("selected").html(filename);
    });
</script>

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever')
        var recipient2 = button.data('whatever2') // Extract info from data-* attributes
        var recipient3 = button.data('whatever3') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input#id').val(recipient)

        var modal2 = $(this)
        modal2.find('.modal-title').text('New message to ' + recipient2)
        modal2.find('.modal-body input#menu').val(recipient2)

        var modal3 = $(this)
        modal3.find('.modal-title').text('New message to ' + recipient3)
        modal3.find('.modal-body input#nourut').val(recipient3)

    })
</script>

<script>
    $('#newAccessMenuModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever')
        var recipient2 = button.data('whatever2')
        var recipient3 = button.data('whatever3')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input#id').val(recipient)

        var modal2 = $(this)
        modal2.find('.modal-title').text('New message to ' + recipient2)
        modal2.find('.modal-body select#role').val(recipient2)

        var modal3 = $(this)
        modal3.find('.modal-title').text('New message to ' + recipient3)
        modal3.find('.modal-body select#menuid').val(recipient3)

    })
</script>

<script>
    $('#newRoleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever')
        var recipient2 = button.data('whatever2')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input#id').val(recipient)

        var modal2 = $(this)
        modal2.find('.modal-title').text('New message to ' + recipient2)
        modal2.find('.modal-body input#role').val(recipient2)

    })
</script>

<script>
    $('#newSubMenuModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever')
        var recipient2 = button.data('whatever2')
        var recipient3 = button.data('whatever3')
        var recipient4 = button.data('whatever4')
        var recipient5 = button.data('whatever5')
        var recipient6 = button.data('whatever6')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input#id').val(recipient)

        var modal2 = $(this)
        modal2.find('.modal-title').text('New message to ' + recipient2)
        modal2.find('.modal-body select#menuid').val(recipient2)

        var modal3 = $(this)
        modal3.find('.modal-title').text('New message to ' + recipient3)
        modal3.find('.modal-body input#title').val(recipient3)

        var modal4 = $(this)
        modal4.find('.modal-title').text('New message to ' + recipient4)
        modal4.find('.modal-body input#url').val(recipient4)

        var modal5 = $(this)
        modal5.find('.modal-title').text('New message to ' + recipient5)
        modal5.find('.modal-body input#icon').val(recipient5)

        var modal6 = $(this)
        modal6.find('.modal-title').text('New message to ' + recipient6)
        modal6.find('.modal-body select#isactive').val(recipient6)
    })
</script>

<script>
    $('.form-check-input').on('click', function() {
        const menuid = $(this).data('menu');
        const roleid = $(this).data('role');

        $.ajax({
            url: "<?= base_url('menu/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuid,
                roleId: roleid
            },
            success: function() {
                document.location.href = "<?= base_url('menu/roleaccess/'); ?>" + roleid;
            }
        });
    });
</script>

</body>

</html>