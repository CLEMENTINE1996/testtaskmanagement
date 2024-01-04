
    <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="{{ env('ASSET_URL') }}public/plugins/common/common.min.js"></script>
    <script src="{{ env('ASSET_URL') }}public/js/custom.min.js"></script>
    <script src="{{ env('ASSET_URL') }}public/js/settings.js"></script>
    <script src="{{ env('ASSET_URL') }}public/js/gleek.js"></script>
    <script src="{{ env('ASSET_URL') }}public/js/styleSwitcher.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#listtable').DataTable();

            $("#addbtn").click(function(){
                $("#exampleModalLabel").text("ADD NEW EMPLOYEE");
                $('#listform')[0].reset();
                $("#empid").val("");
            });

            $("#listform").submit(function(e){
                e.preventDefault();
                const formData     = $(this);
                const empid = $("#empid").val();

                $("#savebtn").attr("disabled", "");

                var formmethod = "POST";
                if(empid != ""){
                    formmethod = "PUT";
                }

                $.ajax({
                    method: formmethod,
                    url: "/api/employees/" + empid,
                    data: formData.serialize(),
                    headers: {'Authorization': "Bearer {{ Session::get('sess_token') }}"},
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
                const empid = $(this).attr("name");
                $.ajax({
                    method: "GET",
                    url: "/api/employees/" + empid,
                    data: {},
                    headers: {'Authorization': "Bearer {{ Session::get('sess_token') }}"},
                    success: (result) => {
                        $("#exampleModalLabel").text("UPDATE EMPLOYEE: " + result.data[0]["firstname"] + " " + result.data[0]["lastname"]);
                        $("#empid").val(result.data[0]["id"]);
                        $("#firstname").val(result.data[0]["firstname"]);
                        $("#lastname").val(result.data[0]["lastname"]);

                        <?php if($user->usertype_id == 1){ ?>
                            $("#position_id").val(result.data[0]["position_id"]);
                        <?php } ?>
                        $("#exampleModal").modal("show");
                    },
                    error: (error) => {
                        alert("Server Error");
                    }
                });
            });

            $(".deletebtn").click(function(){
                if(confirm("Are you sure you want to delete this employee?")){
                    const empid = $(this).attr("name");
                    $.ajax({
                        method: "DELETE",
                        url: "/api/employees/" + empid,
                        data: {},
                        headers: {'Authorization': "Bearer {{ Session::get('sess_token') }}"},
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

        });
    </script>

</body>

</html>