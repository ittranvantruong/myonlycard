@section('title', __('Danh sách thành viên'))
@push('css-lib')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush

@push('css')

@endpush

@push('js-lib')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endpush
@push('js')
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
                "ordering": false
            });
            $(".btnDelete").click(function(e){
                if(!confirm('Bạn có chắc muốn xóa sản phẩm này?')){
                    return;
                }
                $("#formDelete").attr('action', $(this).data('route'));
                $("#formDelete").submit();
            })
        });

    </script>
@endpush

<x-layouts.master>
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ __('Danh sách khách hàng') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <td>{{__('Mã SP')}}</td>
                                                <td>{{__('Họ tên')}}</td>
                                                <td>{{__('Email')}}</td>
                                                <td>{{__('Trạng thái')}}</td>
                                                <td>{{__('Thao tác')}}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->code_card }}</td>
                                                    <td>{{ $user->fullname }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td><span @class([
                                                        'badge',
                                                        'bg-green-lt' => $user->isActive(),
                                                    ])>{{ $user->status->description }}</span></td>
                                                    <td>
                                                        <button type="submit" class="btn btn-sm btn-danger btnDelete" data-route="{{ route('user.delete', $user->id) }}">{{ __('Xóa') }}</button>
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
            </div>
        </div>
    </div>
    <x-form id="formDelete" action="#" type="delete" />
</x-layouts.master>
