<?php
include "util/checksession.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>领域管理</title>
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

    .data-edit {
      float: right;
      margin-top: 10px;
      margin-right: 10px;
      color: white;
      font-size: 23px;
      display: none;
    }

    .data-edit:hover {
      color: darkblue;
    }

    .data-block:hover .data-edit {
      display: block;
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
          str = `<div class="data-block" data-pid="${e.id}" id="field_${e.id}" style="background-color:${randomcolor[index]}">
                  <div class="data-title">${("0" + e.id).slice(-2)}</div>
                  <div class="data-edit"><i class="fas fa-edit"></i></div>
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
          if (e.target.classList.contains("fa-edit")) {
            layer.prompt({
              title: '请输入新的名称',
              formType: 0
            }, function (newname, index) {
              $.post('util/fieldOperation?op=7', {
                name: newname,
                id: pid,
              }, res => {
                try {
                  res = JSON.parse(res)
                } catch (e) {
                  layer.alert(res, {
                    title: "错误",
                    icon: 2
                  });
                }
                if (res.code == 0) {
                  $("#field_" + pid + " .data-status").html(newname);
                  layer.close(index);
                } else {
                  layer.alert(res.msg, {
                    title: "错误",
                    icon: 2
                  });
                }
              })
              layer.close(index);
            });
            return;
          } else {
            form = layer.open({
              type: 2,
              title: '移民管理',
              shade: 0.8,
              area: ['100%', '100%'],
              content: `fieldstate?pid=${pid}`,
            });
          }
        });
      });
    });
  </script>
</body>

</html>