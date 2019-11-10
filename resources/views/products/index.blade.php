@extends('layouts.app', [
    'namePage' => 'Products',
    'namePageLink' => route('products.index'),
    'class' => 'sidebar-mini',
    'activePage' => 'product',
    'backgroundImage' => "/images/honda_logo.png",
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <p class="float-left mt-2">
                                Products
                            </p>
                            <a href="{{route('staffs.create')}}" class="btn btn-sm btn-primary float-right">
                                Add new
                            </a>
                            <div class="clearfix"></div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($allProducts as $currentProduct)
                                    <tr>
                                        <td>
                                            {{ $currentProduct->name  }}
                                        </td>
                                        <td>
                                            {{ $currentProduct->description  }}
                                        </td>
                                        <td>
                                            {{ $currentProduct->type  }}
                                        </td>
                                        <td>
                                            <a href="{{route('products.show',['product'=>$currentProduct])}}">View</a> |
                                            <a href="{{route('products.edit',['product'=>$currentProduct])}}">Update</a> |
                                            <a href="#" class="delete-staff-link">Delete</a>
                                            <form class="{{$currentProduct->id}}_delete" action="{{route('products.destroy',['product'=>$currentProduct])}}" method="POST" >
                                                @csrf
                                                @method('delete')
                                            </form>
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
@endsection
@push('js')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            jQuery(".delete-staff-link").click(function(event) {
                event.preventDefault();
                if (confirm("Are you sure you want to continue ?")) {
                    jQuery(this).parent().find("form").submit();
                }
            });
        });
    </script>
@endpush
