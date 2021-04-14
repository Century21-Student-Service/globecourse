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

    .data-id {
      position: absolute;
      padding-top: 10px;
      padding-left: 10px;
      font-size: xx-large;
      color: white;
    }

    .data-title {
      font-size: 34px;
      margin-top: 77px;
      color: white;
    }

    .data-subtitle {
      font-size: 24px;
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

    .layui-layer-input {
      display: block;
      width: 230px;
      height: 36px;
      margin: 0 auto;
      line-height: 30px;
      padding-left: 10px;
      border: 1px solid #e6e6e6;
      color: #333;
      margin-bottom: 10px;
    }

    .layui-layer-content {
      padding: 15px;
    }

    .layui-layer-btn0 {
      background-color: #0062a9 !important;
      border-color: #0062a9 !important;
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
                  <div class="data-id">${("0" + e.id).slice(-2)}</div>
                  <div class="data-edit"><i class="fas fa-edit"></i></div>
                  <div class="data-title">${e.name}</div>
                  <div class="data-subtitle">${e.name_en || '-'}</div>
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
            layer.open({
              type: 1,
              anim: 2,
              closeBtn: 0,
              shadeClose: true, //开启遮罩关闭
              content: `<input type="text" class="layui-layer-input" id="name_${pid}" value="">
              <input type="text" class="layui-layer-input" id="name_en_${pid}" value="">
              <div class="layui-layer-btn layui-layer-btn-"><a class="layui-layer-btn0">确定</a><a class="layui-layer-btn1">关闭</a></div>`,
              success: function (layero, index) {
                $("#name_" + pid).val(htmlDecode($(`#field_${pid} .data-title`).html()));
                $("#name_en_" + pid).val(htmlDecode($(`#field_${pid} .data-subtitle`).html()));
              },
              yes: function (index, layero) {
                const name = $("#name_" + pid).val();
                const name_en = $("#name_en_" + pid).val();
                $.post('util/fieldOperation?op=7', {
                  name,
                  name_en,
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
                    $("#field_" + pid + " .data-title").html(name);
                    $("#field_" + pid + " .data-subtitle").html(name_en);
                    layer.close(index);
                  } else {
                    layer.alert(res.msg, {
                      title: "错误",
                      icon: 2
                    });
                  }
                })
                layer.close(index);

                layer.close(index);
              }
            });

            // layer.prompt({
            //   title: '请输入新的名称',
            //   formType: 0
            // }, function (newname, index) {
            //   $.post('util/fieldOperation?op=7', {
            //     name: newname,
            //     id: pid,
            //   }, res => {
            //     try {
            //       res = JSON.parse(res)
            //     } catch (e) {
            //       layer.alert(res, {
            //         title: "错误",
            //         icon: 2
            //       });
            //     }
            //     if (res.code == 0) {
            //       $("#field_" + pid + " .data-status").html(newname);
            //       layer.close(index);
            //     } else {
            //       layer.alert(res.msg, {
            //         title: "错误",
            //         icon: 2
            //       });
            //     }
            //   })
            //   layer.close(index);
            // });
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

    function htmlDecode(input) {
      var doc = new DOMParser().parseFromString(input, "text/html");
      return doc.documentElement.textContent;
    }
  </script>
</body>

</html>