
<head>
  <link rel="stylesheet" href="calender.css?v=<?php echo time();?>">
</head>
<body>
    <div class="calendar">
	<div class="header">
		<a data-action="prev-month" href="javascript:void(0)" title="Previous Month"><i></i></a>
		<div class="text" data-render="month-year"></div>
		<a data-action="next-month" href="javascript:void(0)" title="Next Month"><i></i></a>
	</div>
	<div class="months" data-flow="left">
		<div class="month month-a">
			<div class="render render-a"></div>
		</div>
		<div class="month month-b">
			<div class="render render-b"></div>
		</div>
	</div>
</div>


<script src="js/calender.js"></script>
