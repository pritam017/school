<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
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
        <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.j') }}s"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('backend/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('js/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/notify.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.js"></script>


<script>
    $(document).ready(function(){
        $('._delete_data').click(function(e){
            var data_id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.value) {
                    $(document).find('#delete_from_'+data_id).submit();
                }
            })
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore", function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",".removeeventmore", function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });
    });
</script>
<script>
    $(document).on('click','#searchroll', function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        $('.notifyjs-corner').html('');

        if(year_id == ''){
            $.notify("Year required", {globalPosition: 'top-right', className: 'error'});
            return false;
        }
        if(class_id == ''){
            $.notify("Class required", {globalPosition: 'top-right', className: 'error'});
            return false;
        }
        $.ajax({
            url: '{{ route('student.roll.get-student') }}',
            type: 'GET',
            data: {'year_id': year_id, 'class_id': class_id},
            success: function (data) {
                $('#roll-genarate').removeClass('d-none');
                var html = '';
                $.each(data, function( key,v){
                    html+=
                    '<tr>'+
                    '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                    '<td>'+v.student.name+'</td>'+
                    '<td>'+v.student.fname+'</td>'+
                    '<td>'+v.student.gender+'</td>'+
                    '<td><input type="text" required class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
                    '</tr>';
                });
                html = $('#roll-genarate-tr').html(html);
            }

        });
    });
</script>

<script>
    $(document).on('click','#search', function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();


        $.ajax({
            url: '{{ route('student.reg.get-student') }}',
            type: 'get',
            data: {'year_id': year_id, 'class_id': class_id},
            beforeSend: function () {
            },
            success: function (data){
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html= template(data);
                $("#DocumentResults").html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>

<script>
    $(document).on('click','#searchmonth', function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var month = $('#month').val();


        $.ajax({
            url: '{{ route('student.monthly.fee.get-student') }}',
            type: 'get',
            data: {'year_id': year_id, 'class_id': class_id,'month':month},
            beforeSend: function () {
            },
            success: function (data){
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html= template(data);
                $("#DocumentResults").html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>
<script>
    $(document).on('click','#searchexam', function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var exam_type = $('#exam_type').val();


        $.ajax({
            url: '{{ route('student.exam.fee.get-student') }}',
            type: 'get',
            data: {'year_id': year_id, 'class_id': class_id,'exam_type':exam_type},
            beforeSend: function () {
            },
            success: function (data){
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html= template(data);
                $("#DocumentResults").html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>

@stack('js')
<script src="{{ asset('js/handlebars-v4.0.12.js') }}"></script>

</body>

</html>

