<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toast</title>
    <link href="toastr.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="toastr.min.js"></script>
</head>

<body>
    <script>
    toastr.success('New data has been save', 'Notification', 
    {positionClass: 'toast-bottom-right',
        timeOut: 5000,  
        titleClass: 'toast-title',   
        messageClass: 'toast-message', 
        target: 'body',
        newestOnTop: true,
        preventDuplicates: false,
        progressBar: true
    })
    </script>
</body>

</html>