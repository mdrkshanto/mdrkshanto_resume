<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>

    <link href="{{asset('/')}}admin/assets/css/vendor.min.css" rel="stylesheet">
    <link href="{{asset('/')}}admin/assets/css/app.min.css" rel="stylesheet">


    <link href="{{asset('/')}}admin/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet">

    @vite('resources/js/app.js')

</head>
<body class="theme-teal">
<Admin/>

<script src="{{asset('/')}}admin/assets/js/vendor.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/app.min.js"></script>



<script src="{{asset('/')}}admin/assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/jvectormap-content/world-mill.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/demo/dashboard.demo.js"></script>

<script src="https://www.googletagmanager.com/gtag/js?id=G-Y3Q0VGQKY3"></script>
<script type="text/javascript">
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-Y3Q0VGQKY3');
	</script>
<script src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"></script>
</body>

</html>
