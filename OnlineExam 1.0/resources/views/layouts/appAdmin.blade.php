<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>

<body>
    <div class="container-fluid">
        <div class="col-2 fixed-top">
            <div class="grid menu">
                <h3 class="text-center pt-2">Admin</h3>
                <div class="grid-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr style="cursor:pointer" onclick="location.href='#'">
                                <th><i class="fa fa-2x fa-home"></i></th>
                                <td>Dashboard</td>
                            </tr>
                            <tr style="cursor:pointer" onclick="location.href='#'">
                                <th><i class="fa fa-2x fa-group"></i></th>
                                <td>User</td>
                            </tr>
                            <tr style="cursor:pointer" onclick="location.href='#'">
                                <th><i class="fa fa-2x fa-graduation-cap"></i></th>
                                <td>Exam</td>
                            </tr>
                            <tr style="cursor:pointer" onclick="location.href='#'">
                                <th><i class="fa fa-2x fa-question-circle"></i></th>
                                <td>Question</td>
                            </tr>
                            <tr style="cursor:pointer" onclick="location.href='#'">
                                <th><i class="fa fa-2x fa-pencil"></i></th>
                                <td>Scores</td>
                            </tr>
                            <tr style="cursor:pointer" onclick="location.href='#'">
                                <th><i class="fa fa-2x fa-exclamation-circle"></i></th>
                                <td>Report</td>
                            </tr>
                            <tr style="cursor:pointer" onclick="location.href='#'">
                                <th><i class="fa fa-2x fa-gear"></i></th>
                                <td>Setting</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <div class="grid">
                    <div class="grid-body"></div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="grid your-user">
                            <div class="grid-body">
                                <h5>User</h5>
                                <p>500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="grid your-exam">
                            <div class="grid-body">
                                <h5>Exam</h5>
                                <p>500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="grid your-question">
                            <div class="grid-body">
                                <h5>Question</h5>
                                <p>500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="grid your-report">
                            <div class="grid-body">
                                <h5>Report</h5>
                                <p>500</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>