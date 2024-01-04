@extends('components.mainapp')

@section('content')

        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">My Task
                                        </h4>
                                    </div>
                                    <div class="col-md-6">
                                        <button data-toggle="modal" data-target="#exampleModal" id="addbtn" class="btn btn-primary pull-right">Add New Task</button>
                                    </div>
                                </div>
                                
                                <div class="table table-responsive">
                                    <table id="listtable" class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>Task Name</th>
                                                <th >Description</th>
                                                <th >Assign To</th>
                                                <th >Date Created</th>
                                                <th >Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(count($data["data"]) > 0){
                                                    foreach($data["data"] as $taskdata){ ?>
                                                    <tr>
                                                        <td>{{ $taskdata["task_name"] }}</td>
                                                        <td>{{ $taskdata["description"] }}</td>
                                                        <td><b>{{ $taskdata["assign_to"] }}</b></td>
                                                        <td>{{ $taskdata["created_at"] }}</td>
                                                        <td>{{ $taskdata["status"] }}</td>
                                                        <td>
                                                            <div class="btn-group pull-right">
                                                                <button class="btn btn-sm btn-info editbtn" name="{{ $taskdata['id'] }}">Edit</button>
                                                                <button class="btn btn-sm btn-danger deletebtn" name="{{ $taskdata['id'] }}">Delete</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } }
                                               
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">List of Task Assigned To Me
                                        </h4>
                                    </div>
                                </div>
                                
                                <div class="table table-responsive">
                                    <table id="assigntable" class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>Task Name</th>
                                                <th >Description</th>
                                                <th >Assign To</th>
                                                <th >Created By</th>
                                                <th >Date Created</th>
                                                <th >Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(count($assign_task_data["data"]) > 0){
                                                    foreach($assign_task_data["data"] as $taskdata){ ?>
                                                    <tr>
                                                        <td>{{ $taskdata["task_name"] }}</td>
                                                        <td>{{ $taskdata["description"] }}</td>
                                                        <td><b>{{ $taskdata["assign_to"] }}</b></td>
                                                        <td>{{ $taskdata["assign_by"] }}</td>
                                                        <td>{{ $taskdata["created_at"] }}</td>
                                                        <td>{{ $taskdata["status"] }}</td>
                                                        <td>
                                                            <div class="btn-group pull-right">
                                                                <button class="btn btn-sm btn-info statbtn" name="{{ $taskdata['id'] }}">Update Status</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } }
                                               
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <form method="POST"  id="listform" class="modal-content">
                    {{ csrf_field() }}
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD TASK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="taskid" name="taskid" />
                        <div class="col-md-12 mb-3">
                            <label>Title</label>
                            <input class="form-control" name="task_name" id="task_name" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description" ></textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Assign To</label>
                            <select class="form-control" name="assign_to" id="assign_to">
                                <?php 
                                    $employees = App\Models\Employee::
                                    join("persons","persons.id","=","employees.person_id")
                                    ->orderBy("lastname", "asc")
                                    ->select("employees.id", "lastname", "firstname")
                                    ->get();
                                    foreach($employees as $employee){ ?>
                                    <option value="{{ $employee->id }}"><?php echo ($employee->lastname??'') . ", " . ($employee->firstname??''); ?></option>
                                <?php    }
                                ?>
                            </select>
                        </div>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="savebtn" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <form method="POST"  id="statform" class="modal-content">
                    {{ csrf_field() }}
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="taskstatid" name="taskid" />

                        <div class="col-md-12 mb-3">
                            <label>Status</label>
                            <select class="form-control" name="status" id="status">
                                <?php 
                                    $statuses = App\Models\TaskStatus
                                    ::where("id", ">", 1)
                                    ->get();
                                    foreach($statuses as $status){ ?>
                                    <option value="{{ $status->id }}"><?php echo $status->status_name; ?></option>
                                <?php    }
                                ?>
                            </select>
                        </div>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="savebtn2" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>

        </div>

<script type="text/javascript">
        

            $('#listtable, #assigntable').DataTable();

            $("#addbtn").click(function(){
                $("#exampleModalLabel").text("ADD NEW TASK");
                $('#listform')[0].reset();
                $("#taskid").val("");
            });

            $("#listform").submit(function(e){
                e.preventDefault();
                const formData     = $(this);
                const taskid = $("#taskid").val();

                $("#savebtn").attr("disabled", "");

                var formmethod = "POST";
                if(taskid != ""){
                    formmethod = "PUT";
                }

                $.ajax({
                    method: formmethod,
                    url: "/api/tasks/" + taskid,
                    data: formData.serialize(),
                    headers: {'Authorization': "Bearer {{ Session::get('sess_token2') }}"},
                    success: (result) => {
                        alert(result.message);

                        window.location.reload();
                    },
                    error: (error) => {
                        alert("Server Error");
                        window.location.reload();
                    }
                });
            });

            $(".editbtn").click(function(){
                const taskid = $(this).attr("name");
                $.ajax({
                    method: "GET",
                    url: "/api/tasks/" + taskid,
                    data: {},
                    headers: {'Authorization': "Bearer {{ Session::get('sess_token2') }}"},
                    success: (result) => {
                        $("#exampleModalLabel").text("UPDATE TASK: " + result.data[0]["task_name"]);
                        $("#taskid").val(result.data[0]["id"]);
                        $("#task_name").val(result.data[0]["task_name"]);
                        $("#description").val(result.data[0]["description"]);
                        $("#assign_to").val(result.data[0]["assign_to"]);

                        $("#exampleModal").modal("show");
                    },
                    error: (error) => {
                        alert("Server Error");
                    }
                });
            });

            $(".deletebtn").click(function(){
                if(confirm("Are you sure you want to delete this task?")){
                    const taskid = $(this).attr("name");
                    $.ajax({
                        method: "DELETE",
                        url: "/api/tasks/" + taskid,
                        data: {},
                        headers: {'Authorization': "Bearer {{ Session::get('sess_token2') }}"},
                        success: (result) => {

                            alert(result.message);
                            window.location.reload();
                        },
                        error: (error) => {
                            alert("Server Error");
                            window.location.reload();
                        }
                    });
                }
            });

            $(".statbtn").click(function(){
                const taskid = $(this).attr("name");
                const taskname = $(this).closest("tr").find("td:eq(0)").text();

                $("#exampleModalLabel2").text("UPDATE STATUS: " + taskname);
                $("#taskstatid").val(taskid);
                $("#exampleModal2").modal("show");
            });

            $("#statform").submit(function(e){
                e.preventDefault();
                const formData     = $(this);
                const taskid = $("#taskstatid").val();

                $("#savebtn2").attr("disabled", "");

                $.ajax({
                    method: "PUT",
                    url: "/api/tasks/update_task_status/" + taskid,
                    data: formData.serialize(),
                    headers: {'Authorization': "Bearer {{ Session::get('sess_token2') }}"},
                    success: (result) => {
                        alert(result.message);

                        window.location.reload();
                    },
                    error: (error) => {
                        alert(error);
                        window.location.reload();
                    }
                });
            });

     
    </script>

@endsection