@extends('admin/layouts/layout/base')

@section('main_content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <!-- model value  -->
            <div id="myModel" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Record ?</h5>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this record?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="deleteButton" onclick="closeModel()" class="btn btn-secondary">Close</button>
                            <button type="submit" id="savebutton" onclick="closeModel()" class="btn btn-primary rounded-1">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- model value  -->
            <div class="row">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-domain"></i>
                        </span> Properties
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span> <a href="{{ route('propertymanager.create') }}" class="btn btn-success btn-lg float-right">Create</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            @if (Session::has('success'))

            <div class="alert alert-success">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <div class="card-body">
                <table class="table table-bordered" id="datatable-crud">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Price</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</div>

<script type="text/javascript">
    let nikh
    $(document).ready(function() {
        $(".delete").hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/admin/propertymanager') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'contactNumber',
                    name: 'contactNumber'
                },

                {
                    data: 'totalPrice',
                    name: 'totalPrice'
                },
                {
                    data: 'Utype',
                    name: 'Utype'
                },
                {
                    class: "actionIcons",
                    orderable: false,
                    "render": function(data, type, full, meta) {
                        var url = "{{route('propertymanager.update', '')}}" + "/" + full.id;
                        var show = "{{route('propertymanager.show','')}}" + "/" + full.id;
                        var edit_url = "{{route('propertymanager.edit', '')}}";
                        var edit_url1 = "{{ env('APP_URL') }}"+ "/admin/propertymanager/" + full.id + "/edit";
                        console.log(edit_url1)
                        return `
                        <a href="${show}"class="btn btn-success">
                           <i class='fa fa-eye'></i>
                        </a>
                        <a href="${edit_url1}" class="btn btn-primary rounded-1">
                             <i class='fa fa-edit'></i>
                        </a>
                        <button onclick="togglemodel(${full.id})" type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModelHere">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <form method="POST" action=${url}>
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn ${ full.status === 1 ? 'btn-info' : 'btn-danger'}" 
                            name="action" value="status_toggle">
                                ${ full.status === 1 ? 
                                    '<i class="fas fa-check"></i>'
                                    :
                                    '<i class="fas fa-ban"></i>'
                                }
                            </button>
                        </form>
                        `
                    },
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
        $('#savebutton').on('click', function() {
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/delete-propertymanager') }}",
                data: {
                    id: nikh
                },
                dataType: 'json',
                success: function(res) {
                    if (res) {
                        $(".delete").show();
                        $(".delete").push("Record has been deleted successfully");
                    }
                    var oTable = $('#datatable-crud').dataTable();
                    oTable.fnDraw(false);
                }
            });
        });
    });

    function togglemodel(id) {
        nikh = id
        let mod = document.getElementById('myModel').style.display = "block"
    }

    function closeModel() {
        let clos = document.getElementById('myModel').style.display = "none"
    }
</script>

@endsection('main_content')