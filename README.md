# Backend


> **EMPLOYEE ASSESSMENT** 
1. Clone the Repository
2. CD into the desired project folder 
3. Install all projects dependencies using `composer install`.
> If you dont have composer installed, download composer with this [link](https://getcomposer.org/download/).
4. Copy the content of `.env.example` and create a `.env`and paste the content
5. Run `php artisan migrate` to create database tables on the database
6. Start backend server locally.. `php artisan serve`. This should startup a local server @ `http://localhost:8000
> make sure MYSQL server has started locally before running the above commands.


# Endpoints.

### List all added employee.

GET
```shell
https://boluajileye.com/employee/api/employee 
```

### Create Employee

POST
```shell
https://boluajileye.com/employee/api/employee/add
```
PAYLOAD DATA

```shell
{
    "firstname": "sodiq",
    "lastname": "williams",
    "email": "sodiq@williams.com",
    "age": "34",
    "work_department": "DevOps"
}
```
### Delete Employee by employee ID

DELETE
```shell
https://boluajileye.com/employee/api/employee/{employee_id}/delete
```

### Add Rating to each employee by employee ID

POST
```shell
https://boluajileye.com/employee/api/employee/{employee_id}/rating
```
PAYLOAD DATA

```shell
{
  'work quality': '5',
  'task completion': '5',
  'over and abroad': '5',
  'communication': '5',
  'reason': 'Great Performance ' 
}
```
> If an error occur while migrating, cross check the `**.env**`  file and make sure you passed the correct database informations

```