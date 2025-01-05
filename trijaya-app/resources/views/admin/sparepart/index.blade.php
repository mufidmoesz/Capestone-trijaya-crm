@extends('layouts.layoutcontent')
@section('content')
    <h3>Sparepart</h3>
    <div>
        <div class="text-end mb-3">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">+</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($addons as $addon)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $addon->name }}</td>
                    <td>{{ $addon->description }}</td>
                    <td>{{ $addon->stock }}</td>
                    <td>{{ $addon->price }}</td>
                    <td>
                        <!-- Update Button -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateModal-{{ $addon->addon_id }}">Update</button>
                        
                        <!-- Delete Form -->
                        <form action="addons/{{$addon->addon_id}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Update Modal -->
                <div class="modal fade" id="updateModal-{{ $addon->addon_id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel-{{ $addon->addon_id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel-{{ $addon->addon_id }}">Update Sparepart</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="addons/{{$addon->addon_id}}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name-{{ $addon->addon_id }}">Sparepart Name:</label>
                                        <input type="text" class="form-control" id="name-{{ $addon->addon_id }}" name="name" value="{{ old('name', $addon->name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description-{{ $addon->addon_id }}">Description:</label>
                                        <input type="text" class="form-control" id="description-{{ $addon->addon_id }}" name="description" value="{{ old('description', $addon->description) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price-{{ $addon->addon_id }}">Price:</label>
                                        <input type="text" class="form-control" id="price-{{ $addon->addon_id }}" name="price" value="{{ old('price', $addon->price) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock-{{ $addon->addon_id }}">Stock:</label>
                                        <input type="text" class="form-control" id="stock-{{ $addon->addon_id }}" name="stock" value="{{ old('stock', $addon->stock) }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-2">Update Sparepart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sparepart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="addons" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Sparepart Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tire Kit" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="30" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="5" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
