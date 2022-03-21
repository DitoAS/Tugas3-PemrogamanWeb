<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="toastr/toastr.css">
    <title>Document</title>
</head>
<body>
    <section class="container-fluid">
        <section class="mt-5 pt-5 row justify-content-center">
            <section class="col-md-6 col-sm-12">
                <section class="card">
                    <div class="card-header">Upload File:</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="file" class="form-control" id="file" />
                            </div>
                            <div class="col">
                                <button class="btn btn-success" id="upload">Upload</button>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </section>
    
    <script src="toastr/jquery.js"></script>
    <script src="toastr/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script>
        $('#upload').on("click", function () {
            let file = $("#file").prop("files")[0];
            let form = new FormData();
            form.append("file", file);
            // alert(form);
            $.ajax({
                url: "upload.php",
                cache: false,
                contentType: false, 
                processData: false,
                data: form,
                type: 'post',
                success: function (resp) {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    toastr["success"]("File Berhasil di Upload!", "Success")
                }
            });
        });

        $("#file").change(function () {
            let allowed = ['application/pdf', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'];
            let file = this.files[0];
            let typeFile = file.type;
            if(!allowed.includes(typeFile)){
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                toastr["warning"]("Hanya Support File jenis PDF/Excel!", "Warning")
                $("#file").val('');
                return false;
            }
        })
    </script>
</body>
</html>
