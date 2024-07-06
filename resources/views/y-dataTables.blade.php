<!DOCTYPE html>

<html lang="en">
<head>
    <title>Product List with DataTables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container">
    <h2 style="margin-bottom:30px;margin-top: 20px">Product List with DataTables</h2>
    <table class="table table-bordered"  id="y_dataTables">
        <thead>
        <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Created at</th>
        </tr>
        </thead>
    </table>
</div>
<script>
    $(document).ready(function () {
        $("#y_dataTables").DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: "{{ url('list') }}",
            columns: [
                { data: "id", name: "id" },
                { data: "product_name", name: "product_name" },
                { data: "description", name: "description" },
                { data: "created_at", name: "created_at" },
            ],
            buttons: ['copy', 'csv', 'excel']
        });
    });
</script>
</body>
</html>
