@extends('admin.layout')

@section('title', 'Create')


@section('style')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endsection



@section('js')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#editor').summernote({
                code : "{{ $errors->first('answer', ':message') }}",
                height:200,
            });
        });
    </script>

@endsection

@section('content')

    <!-- BEGIN PAGE CONTENT INNER -->

    <div class="profile-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <ul class="nav nav-tabs">
                            <li {{{  (Session::has('tabactive') ? '' : 'class=active') }}}> <a href="#tab_1_1" data-toggle="tab">Subscription List</a> </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!--TAB -->
                            <div class="tab-pane {{{  (Session::has('tabactive') ? '' : 'active') }}}" id="tab_1_1">
                                <table id="faq-table" class="table">
                                    <thead>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td><strong>Number of Days</strong></td>
                                        <td><strong>Price</strong></td>
                                        <td><strong>Status</strong></td>
                                        <td><strong>Description</strong></td>
                                        <td><strong>Action</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(@$subview as $val)
                                    <tr>
                                        <td>{{ $val['subscription_name'] }}</td>
                                        <td>{{ $val['number_days'] }}</td>
                                        <td>{{ $val['price'] }}</td>
                                        <td>{{ $val['status'] }}</td>
                                        <td>{!! str_limit($val['description'],5) !!}</td>
                                        <td>
                                            <form method="get" action="{{ URL::to('admin/subscription/'.$val->id.'/edit') }}"> <button class="btn btn-xs btn-primary" type="submit">edit</button></form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- END TAB -->

                            <!--TAB -->

                            <!-- END TAB -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection