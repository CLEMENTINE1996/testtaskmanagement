TASK MANAGEMENT USING LARAVEL WITH REST API
<br>
The database of this application is located in the database folder.
<br>

The application have GUI on performing CRUD commands for the employee data but you can also use its RESTAPI commands with authentication. To access its api routes, simply install this application and use the api points below:

For employee management
1. POST = your_url + "api/employees".<br>
2. GET = your_url + "api/employees".<br>
3. PUT = your_url + "api/employees/{employee_id}".<br>
4. GET = your_url + "api/employees/{employee_id}".<br>
4. DELETE = your_url + "api/employees/{employee_id}".<br>

For task management
1. POST = your_url + "api/tasks".<br>
2. GET = your_url + "api/tasks".<br>
3. PUT = your_url + "api/tasks/{task_id}".<br>
4. GET = your_url + "api/tasks/{task_id}".<br>
4. DELETE = your_url + "api/tasks/{task_id}".<br>
5. PUT = your_url + "api/tasks/update_task_status/{taskid}".<br>

For the authentication, use

1. POST = your_url + "api/login".<br>
with "email" and "password" as body message. Then save your Bearer Token for the above commands.

