<?php
include "util/checksession.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>欢迎</title>
  <?php
getcss("ajax/libs/font-awesome/5.15.1/css/all.min.css");
getcss("js/layer/theme/default/layer.css", true);
getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("js/layer/layer.js", true);
?>
  <style type="text/css">
    .logo {
      text-align: center;
      margin: 15px;
    }

    .root {
      padding: 25px;
    }

    .data-block {
      display: inline-block;
      width: 300px;
      height: 200px;
      border-radius: 10px;
      margin-left: 5%;
      margin-top: 20px;
      text-align: center;
      cursor: pointer;
    }

    .data-title {
      position: absolute;
      padding-top: 10px;
      padding-left: 10px;
      font-size: xx-large;
      color: white;
    }

    .data-status {
      font-size: 34px;
      margin-top: 77px;
      color: white;
    }

    .data-compare {
      font-size: 16px;
      color: white;
    }
  </style>
</head>

<body>
  <div class="root"></div>


  <script>
    window.fields = [];
    const randomcolor = [
      'lightblue',
      'lightgreen',
      'lightcoral',
      'lightseagreen',
      'lightsalmon',
      'lightsteelblue',
      'lightskyblue',
    ];
    $(function () {
      $.get("util/fieldOperation", function (res) {
        res = JSON.parse(res);
        window.fields = res;
        let index = 0;
        res.forEach(e => {
          str = `<div class="data-block" data-pid="${e.id}" style="background-color:${randomcolor[index]}">
                  <div class="data-title">${("0" + e.id).slice(-2)}</div>
                  <div class="data-status">${e.name}</div>
                  <div class="data-compare">
                  </div>
                </div>`;
          $(".root").append(str);
          index++;
          if (index == randomcolor.length) index = 0;
        });

        $(".data-block").click(e => {
          const pid = $(e.currentTarget).data("pid");
          form = layer.open({
            type: 2,
            title: '移民管理',
            shade: 0.8,
            area: ['100%', '100%'],
            content: `fieldstate?pid=${pid}`,
          });
        });
      });
    });


    // $(function () {
    // 	$.get("util/dataOperation.php?op=0", function (res) {
    // 		res = JSON.parse(res);
    // 		const data = res.msg;
    // 		$(".data-preinput .data-status").html(data.today);
    // 		if (data.yesterday != null) {
    // 			if (data.yesterday < 0) {
    // 				$(".data-preinput .data-compare .i-yesterday").addClass('fa-arrow-down');
    // 			} else {
    // 				$(".data-preinput .data-compare .i-yesterday").addClass('fa-arrow-up');
    // 			}
    // 			$(".data-preinput .data-compare .data-yesterday").html(' ' + Math.round(data.yesterday * 100) + '%');
    // 		}

    // 		if (data.week != null) {
    // 			if (data.week < 0) {
    // 				$(".data-preinput .data-compare .i-week").addClass('fa-arrow-down');
    // 			} else {
    // 				$(".data-preinput .data-compare .i-week").addClass('fa-arrow-up');
    // 			}
    // 			$(".data-preinput .data-compare .data-week").html(' ' + Math.round(data.week * 100) + '%');
    // 		}

    // 		if (data.month != null) {
    // 			if (data.month < 0) {
    // 				$(".data-preinput .data-compare .i-month").addClass('fa-arrow-down');
    // 			} else {
    // 				$(".data-preinput .data-compare .i-month").addClass('fa-arrow-up');
    // 			}
    // 			$(".data-preinput .data-compare .data-month").html(' ' + Math.round(data.month * 100) + '%');
    // 		}
    // 	});

    // 	$.get("util/dataOperation.php?op=1", function (res) {
    // 		res = JSON.parse(res);
    // 		const data = res.msg;
    // 		$(".data-collect .data-status").html(data.today);
    // 		if (data.yesterday != null) {
    // 			if (data.yesterday < 0) {
    // 				$(".data-collect .data-compare .i-yesterday").addClass('fa-arrow-down');
    // 			} else {
    // 				$(".data-collect .data-compare .i-yesterday").addClass('fa-arrow-up');
    // 			}
    // 			$(".data-collect .data-compare .data-yesterday").html(' ' + Math.round(data.yesterday * 100) + '%');
    // 		}

    // 		if (data.week != null) {
    // 			if (data.week < 0) {
    // 				$(".data-collect .data-compare .i-week").addClass('fa-arrow-down');
    // 			} else {
    // 				$(".data-collect .data-compare .i-week").addClass('fa-arrow-up');
    // 			}
    // 			$(".data-collect .data-compare .data-week").html(' ' + Math.round(data.week * 100) + '%');
    // 		}

    // 		if (data.month != null) {
    // 			if (data.month < 0) {
    // 				$(".data-collect .data-compare .i-month").addClass('fa-arrow-down');
    // 			} else {
    // 				$(".data-collect .data-compare .i-month").addClass('fa-arrow-up');
    // 			}
    // 			$(".data-collect .data-compare .data-month").html(' ' + Math.round(data.month * 100) + '%');
    // 		}
    // 	});

    // 	$.get("util/dataOperation.php?op=2", function (res) {
    // 		res = JSON.parse(res);
    // 		const data = res.msg;
    // 		$(".data-deliver .data-status").html(data.today);
    // 		if (data.yesterday != null) {
    // 			if (data.yesterday < 0) {
    // 				$(".data-deliver .data-compare .i-yesterday").addClass('fa-arrow-down');
    // 			} else {
    // 				$(".data-deliver .data-compare .i-yesterday").addClass('fa-arrow-up');
    // 			}
    // 			$(".data-deliver .data-compare .data-yesterday").html(' ' + Math.round(data.yesterday * 100) + '%');
    // 		}

    // 		if (data.week != null) {
    // 			if (data.week < 0) {
    // 				$(".data-deliver .data-compare .i-week").addClass('fa-arrow-down');
    // 			} else {
    // 				$(".data-deliver .data-compare .i-week").addClass('fa-arrow-up');
    // 			}
    // 			$(".data-deliver .data-compare .data-week").html(' ' + Math.round(data.week * 100) + '%');
    // 		}

    // 		if (data.month != null) {
    // 			if (data.month < 0) {
    // 				$(".data-deliver .data-compare .i-month").addClass('fa-arrow-down');
    // 			} else {
    // 				$(".data-deliver .data-compare .i-month").addClass('fa-arrow-up');
    // 			}
    // 			$(".data-deliver .data-compare .data-month").html(' ' + Math.round(data.month * 100) + '%');
    // 		}
    // 	});

    // 	$.get("util/dataOperation.php?op=3", function (res) {
    // 		res = JSON.parse(res);
    // 		const data = res.msg;
    // 		const date = new Date(data.datetime.substr(0, 10))
    // 		const time = data.datetime.substr(11, 9);
    // 		const ds = (new Date()).getTime() - date.getTime();
    // 		let days = Math.floor(ds / (1000 * 3600 * 24));
    // 		if (days <= 0)
    // 			days = "今天";
    // 		else if (days == 1)
    // 			days = "昨天";
    // 		else
    // 			days = days + " 天前";

    // 		$(".data-inventory .data-status").html(data.total);
    // 		$(".data-inventory .data-compare .data-inventory-date").html(days);
    // 		$(".data-inventory .data-compare .data-inventory-time").html(data.datetime.substr(11, 5));
    // 	});
    // });
  </script>
</body>

</html>