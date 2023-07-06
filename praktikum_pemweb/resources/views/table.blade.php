@extends('layouts.table.main')
@section('container')
           <div class="panel-header panel-header-sm"></div>
            <!--Create Modal-->
            <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Menus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('table.store') }}" method="POST" id="formCreate" enctype="multipart/form-data"> @csrf <div class="col-md-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required min="3">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="size" class="form-label">Size</label>
                                    <select name="size" id="size" class="form-control" required>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="temperature" class="form-label">Temperature</label>
                                    <select name="temperature" id="temperature" class="form-control" required>
                                        <option value="Hot">Hot</option>
                                        <option value="Cold">Cold</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                                <input type="submit" id="createSubmit" class="d-none">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="submitCreate()">Create</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Create Modal-->

            

                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> Beverage</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <button type="button" class="btn btn-primary btn-burger" data-bs-toggle="modal" data-bs-target="#create">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="material-symbols-outlined"> Add </span>
                                                </div>

                                            <thead class=" text-primary">
                                                <th> ID </th>
                                                <th> Name </th>
                                                <th> Size </th>
                                                <th> Temperature </th>
                                                <th class="text-right"> Price </th>
                                                <th>  </th>
                                                <th>  </th>
                                            </thead>
                                            <tbody> @foreach ($menus as $menu) <tr>
                                                    <td>{{ $menu -> id }}</td>
                                                    <td>{{ $menu -> name }}</td>
                                                    <td>{{ $menu -> size }}</td>
                                                    <td>{{ $menu -> temperature }}</td>
                                                    <td class="text-right">{{ 'Rp' . number_format($menu -> price, 0, '.', '.') }}</td>
                                                    <td>
                                                        <form action="{{ route('table.destroy', $menu->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary btn-burger">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <span class="material-symbols-outlined"> Delete </span>
                                                                </div>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="#edit{{ $menu->id }}" method="POST"> 
                                                            <button type="button" class="btn btn-primary btn-burger" data-bs-toggle="modal" data-bs-target="#edit{{ $menu->id }}">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <span class="material-symbols-outlined"> Edit </span>
                                                                </div>
                                                            </form>
                                                    </td>
                                                </tr> @endforeach </tbody>
                                        </table>
                                        <!--Edit Modal-->
                                        @foreach ($menus as $menu)
            <div class="modal fade" id="edit{{ $menu -> id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Menus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('table.update', $menu -> id) }}" method="POST" id="formEdit" enctype="multipart/form-data"> @csrf <div class="col-md-12">
                                @method('PUT') @csrf
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required min="3">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="size" class="form-label">Size</label>
                                    <select name="size" id="size" class="form-control" required>
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="temperature" class="form-label">Temperature</label>
                                    <select name="temperature" id="temperature" class="form-control" required>
                                        <option value="Hot">Hot</option>
                                        <option value="Cold">Cold</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                                <input type="submit" id="editSubmit" class="d-none">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" onclick="submitEdit()">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!--End Edit Modal-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
@section('script')
<script>
    function submitCreate(){
        $('#createSubmit').click();
    }

    function submitEdit(){
        $('#editSubmit').click();
    }

    function submitDelete(){
        $('#deleteSubmit').click();
    }

    function submitForm(){
        document.getElementById("formEdit").submit();
    }
</script>
@endsection