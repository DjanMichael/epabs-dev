@extends('layouts.app')
@section('title','AOP')
@section('content')
<div class="container" style="min-height:500px">
    <div class="row">
        <div class="col-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                 <div class="card-title">
                    <h3 class="card-label">
                        AOP
                        <small>List</small>
                    </h3>
                    </div>
                    <div class="card-toolbar">
                        <button href="#" class="btn btn-sm  btn-light-primary mr-2">
                            <i class="fas fa-plus mr-2"></i> Create
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                        <thead>
                            <tr class="text-left">
                                <th style="min-width: 200px">Program Coordinator</th>
                                <th style="min-width: 150px">Office</th>
                                <th style="min-width: 150px">Program</th>
                                <th style="min-width: 150px">Budget</th>
                                <th style="min-width: 160px">Year</th>
                                <th class="pr-0 text-right" style="min-width: 150px">action</th>
                            </tr>
                        </thead>
                        <tbody id="aop_content">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    function fetchAOPlist(){
        var _url = "{{ route('get_aop_list') }}";
        $.ajax({
            method:"GET",
            url:_url,
            success:function(data){
                document.getElementById('aop_content').innerHTML = data;
            }
        })
    }
    $(document).ready(function(){
        fetchAOPlist();
    });
</script>
@endpush
