<?php include "util/checksession.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>领域 - 移民</title>
  <?php
getcss("ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css");
getcss("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.css");
getcss("ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
getcss("ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css");
getcss("js/layer/theme/default/layer.css", true);
?>
  <style>
    .field-title {
      font-weight: 700;
    }

    h1 {
      margin: 18px 0;
    }

    .btn-field-del {
      float: right;
      display: none;
    }

    .field-title:hover .btn-field-del {
      display: block;
    }
  </style>
</head>

<body>
  <div class='container'>
    <header>
      <h1></h1>
    </header>
    <table id="tbl-state"></table>
    <div style="float: left; margin: 15px 0;">
      <button type="button" class="btn btn-primary" id='btn_add'>
        添加
      </button>
    </div>
    <div style="float: right; margin: 15px 0;">
      <button type="button" class="btn btn-primary" id='btn_save'>
        保存
      </button>
      <button type="button" class="btn btn-default" id='btn_close'>
        关闭
      </button>
    </div>
  </div>

  <?php

getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/locale/bootstrap-table-zh-CN.min.js");
getjs("ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.js");
getjs("js/layer/layer.js", true);
?>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const pid = urlParams.get('pid');
    let
      states = [],
      immi = [],
      data = [];
    parent.fields.forEach(e => {
      if (e.id == pid) $("h1").html(e.name);
    });

    function refreshTable() {
      const getStates = $.get("util/fieldOperation.php?op=1", res => {
        states = JSON.parse(res);
      });
      // const getFields = $.get("util/fieldOperation.php?op=2&pid=" + pid, res => {
      //   fields = JSON.parse(res);
      // });
      const getImmi = $.get("util/fieldOperation.php?op=3&pid=" + pid, res => {
        immi = JSON.parse(res);
      });

      Promise.all([getStates, getImmi]).then(res => {
        let columns = [{
          field: 'field_name',
          title: '名称',
          valign: 'middle',
          width: 180,
          class: "field-title",
          formatter: function (value, row, index) {
            return value + `<button class='btn btn-sm btn-danger btn-field-del' data-fieldid='${row.field_id}'>删除</button>`;
          }
        }, {
          field: '0',
          title: 'Non-Regional',
          width: 50,
          align: "center",
          valign: 'middle',
          formatter: function (value, row, index) {
            var checked = value == '1' ? 'checked' : '';
            return `<input type="checkbox" ${checked} data-stateid="0" data-fieldid="${row.field_id}" ` +
              '" class="toggle-button" data-on="是" data-off="否" />';
          }
        }];
        states.forEach(e => {
          columns.push({
            field: e.id,
            title: e.code,
            width: 50,
            align: "center",
            valign: 'middle',
            formatter: function (value, row, index) {
              var checked = value == '1' ? 'checked' : '';
              return `<input type="checkbox" ${checked} data-stateid="${e.id}" data-fieldid="${row.field_id}" ` +
                '" class="toggle-button" data-on="是" data-off="否" />';
            }
          });
        });
        $("#tbl-state").bootstrapTable("destroy");
        $("#tbl-state").bootstrapTable({
          uniqueId: "field_id",
          data: immi,
          columns,
          onPostBody: function () {
            $('.toggle-button').bootstrapToggle();
            $(".btn-field-del").click(e => {
              const fid = $(e.currentTarget).data("fieldid");
              $.post("util/fieldOperation.php?op=6", {
                fid
              }, res => {
                try {
                  res = JSON.parse(res);
                } catch (e) {
                  layer.alert('未知错误：' + res, {
                    title: "错误",
                    icon: 2
                  });
                  console.log(res);
                  return;
                }
                if (res.code == 0) {
                  refreshTable();
                } else if (res.code == 10) {
                  let msg = `不能删除 - 此领域下包含「${res.msg.rows.length}」门课程<br>`;
                  let i = 0;
                  res.msg.rows.forEach(e => {
                    i++;
                    msg += `${i}. ${e.course}<br>${e.inst}<br><br>`; // i+e.course + e.inst + "<br>";
                  });
                  msg = msg.replace(/<br><br>$/g, '');
                  layer.alert(msg, {
                    title: "错误",
                    icon: 2
                  });
                  return;
                } else {
                  layer.alert(res.msg, {
                    title: "错误",
                    icon: 2
                  });
                  return;
                }
              });
            });
          },
        });
      });
    }

    $("#btn_close").click(e => {
      parent.layer.close(parent.form);
    });

    $("#btn_save").click(e => {
      let data = [];
      $("input.toggle-button").each((i, e) => {
        data.push({
          state: $(e).data("stateid"),
          field: $(e).data("fieldid"),
          checked: $(e)[0].checked,
        });
      });
      $.post('util/fieldOperation.php?op=4', JSON.stringify(data), res => {
        try {
          res = JSON.parse(res);
        } catch (e) {
          layer.alert('未知错误：' + res, {
            title: "错误",
            icon: 2
          });
          console.log(res);
          return;
        }
        if (res.code == 0) {
          parent.layer.close(parent.form);
        } else {
          layer.alert(res.msg, {
            title: "错误",
            icon: 2
          });
          return;
        }
      });
    });

    $("#btn_add").click(e => {
      layer.prompt({
        title: '请输入领域名称',
      }, function (name, index) {
        $.post("util/fieldOperation.php?op=5", {
          pid,
          name
        }, res => {
          try {
            res = JSON.parse(res);
          } catch (e) {
            layer.alert('未知错误：' + res, {
              title: "错误",
              icon: 2
            });
            console.log(res);
            return;
          }
          if (res.code == 0) {
            layer.close(index);
            refreshTable();
          } else {
            layer.alert(res.msg, {
              title: "错误",
              icon: 2
            });
            return;
          }
        });

      });
    });

    refreshTable();
  </script>
</body>

</html>