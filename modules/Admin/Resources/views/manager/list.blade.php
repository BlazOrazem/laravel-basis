@extends('admin::layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Managers</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <datatable title="Managers" admin-id="{{ $admin->id }}"></datatable>

            <template id="managers-template">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        @{{ title }}
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table data-table table-striped table-hover" data-paging='false' data-order='[[ 1, "asc" ]]'>
                                <thead>
                                    <tr>
                                        <th class="no-sort" width="50"></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Created at</th>
                                        <th class="no-sort text-center" width="30">Edit</th>
                                        <th class="no-sort text-center" width="30">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="manager in list">
                                        <td class="text-center"><img :src="manager.avatar" width="50" height="50" class="img-circle"></td>
                                        <td>@{{ manager.name }}</td>
                                        <td>@{{ manager.email }}</td>
                                        <td>@{{ manager.phone }}</td>
                                        <td>@{{ manager.created_at }}</td>
                                        <td class="text-center">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </td>
                                        <td class="text-center">
                                            <form v-if="adminId != manager.id" method="POST"
                                                  action="/admin/manager/@{{ manager.id }}"
                                                  @submit.prevent="submit($event, manager)"
                                                  title="Are you sure?"
                                                  notification="This action is irreversible."
                                                  completeTitle="Deleted"
                                                  completeText="The manager has been deleted."
                                                  data-id="@{{ manager.id }}"
                                            >
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-link">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </template>

        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->

@stop