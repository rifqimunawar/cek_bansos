@extends('settings::layouts.master')

@section('module-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic</h4>
                </div>
                <div class="d-flex justify-end my-2 mx-2">
                    <a href="{{ route('menu.create') }}" class="btn btn-sm btn-primary">Tambah
                        <i class="bi bi-plus-circle" style="font-size: 14px; margin-left:2px"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>url</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->url }}</td>
                                        <td>
                                            <a href="{{ route('menu.edit', $item->id) }}">
                                                <i class="fa fa-pencil-square"
                                                    style="font-size: 14px; margin-right:5px"></i>
                                            </a>
                                            <a href="{{ route('menu.destroy', $item->id) }}" data-confirm-delete="true">
                                                <i class="fa fa-trash mx-2" style="font-size: 14px"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
