@extends('layouts.admin')


<!-- Sidebar -->
@section('sidebar')
@parent

@endsection
<!-- End of Sidebar -->


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Category List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-icon-split btn-sm btn-add-new">
                    <span class="icon">
                        <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">Add new</span>
                </a>
                @include('common.checkSave')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($cat_tours as $cat_tour)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $cat_tour->cat_name }}</td>
                            <td class="action-crud">
                                <a href="{{ route('category.edit', $cat_tour->id) }}" class="btn btn-info btn-circle btn-edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $cat_tours->fragment('table')->links() }}
        </div>
    </div>

</div>
<!-- End of Main Content -->

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

@endsection

</html>
