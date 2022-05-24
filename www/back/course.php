<?php include "util/checksession.php";?>
<!DOCTYPE html>
<html>

<head>
  <title>课程管理</title>
  <?php
getcss("ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css");
getcss("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.css");
getcss("css/magnific-popup.css", true);
getcss("js/layer/theme/default/layer.css", true);
?>

  <style>
    button.btn-update {
      margin: 4px 0 4px 4px;
    }

    span.toggle {
      cursor: pointer;
    }

    span.toggle-text {
      padding: 7px;
    }

    .toggle-field {
      padding: 7px;
    }

    #search_keyword {
      border-radius: 0px 4px 4px 0px;
    }

    .preinput-control {
      margin-right: 5px;
    }

    .cell-found {
      font-weight: bold;
    }

    .tbl-badge {
      max-width: 100px;
      height: 60px;
    }

    .btn-edit {
      margin-right: 4px;
    }

    div.popover {
      min-width: 120px;
    }

    .popover-title {
      width: 100%;
    }

    .tbl-course {
      min-height: 200px;
    }

    .container {
      width: 90%;
    }

    .invalid {
      border: solid 2px red;
      box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px pink
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <h1>课程管理</h1>
    </header>
    <div class="input-group" style="float:left; margin-top: 10px; margin-bottom: 10px;">
      <span class="input-group-btn">
        <button type="button" class="btn btn-primary" id="search-btn" onclick='refresh()'>
          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
      </span>
      <input id="search_keyword" type="text" class="preinput-control form-control " style="position: static;width:200px;" placeholder="输入课程名称...">
      <select id="states" name="states" class="btn btn-default preinput-control" style="width: 140px;"></select>
      <select id="institutions" name="institutions" class="btn btn-default preinput-control" style="width: 140px;"></select>
      <select id="level" name="level" class="btn btn-default preinput-control" style="width: 140px;"></select>
      <select id="field_p" name="field_p" class="btn btn-default preinput-control" style="width: 140px;"></select>
      <select id="field_c" name="field_c" class="btn btn-default preinput-control" style="width: 140px;"></select>

      <div style="float: right;">
        <button type="button" class="btn btn-primary " onclick='FormCourse(0)'>
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><b> 添加课程</b>
        </button>
        <button type="button" class="btn btn-primary btn-control" id="refresh_unuse" onclick="refresh();">
          <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 刷新
        </button>
      </div>
    </div>

    <table class="table table-sm table-hover" id="courseTab"></table>

  </div>

  <?php
getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/locale/bootstrap-table-zh-CN.min.js");
getjs("js/jquery.magnific-popup.min.js", true);
getjs("js/layer/layer.js", true);
?>
  <script type="text/javascript">
    var form = null;
    let STATESANDINST = [],
      FIELDS = [];
    var current_scroll = {
      x: 0,
      y: 0
    };

    const column_course = [{
      title: '名称',
      field: 'name',
      align: 'left',
      valign: 'middle',
      sortable: true,
      formatter: function (value, row, index) {
        return `<a href='#' onClick='FormCourse(${row.inst_id},${row.id})'>${value}</a>`;
      }
    }, {
      title: '英文名称',
      field: 'name_en',
      align: 'left',
      valign: 'middle',
      width: 240,
      sortable: true,
    }, {
      title: '院校',
      field: 'inst',
      align: 'left',
      valign: 'middle',
      width: 180,
      sortable: true,
    }, {
      title: '级别',
      field: 'level',
      align: 'center',
      valign: 'middle',
      width: 130,
      sortable: true,
      formatter: function (value, row, index) {
        let content =
          `<select id='input_level_${row.id}' class='form-control change-level'></select>
          <button type='button' class='btn btn-success btn-sm btn-update' onclick='saveLevel(${row.id})'>
          <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>
          <button type='button' class='btn btn-danger btn-sm btn-update' onclick='dismissLevel(${row.id})'>
          <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>`
        return `<span id="toggle_level_${row.id}" class="toggle toggle-level" data-toggle="popover" title="修改级别" data-content="${content}">${value}</span>`;
      }
    }, {
      title: '领域',
      field: 'field',
      align: 'center',
      valign: 'middle',
      width: 150,
      sortable: true,
      formatter: function (value, row, index) {
        value = value.c.length > 0 ? value.c : "-";
        let content =
          `<select id='input_field_p_${row.id}' class='form-control change-field change-field-p'></select>
          <select id='input_field_c_${row.id}' class='form-control change-field change-field-c'></select>
          <button type='button' class='btn btn-success btn-sm btn-update' onclick='saveField(${row.id})'>
          <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>
          <button type='button' class='btn btn-danger btn-sm btn-update' onclick='dismissField(${row.id})'>
          <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>`
        return `<span id="toggle_field_${row.id}" class="toggle toggle-field" data-toggle="popover" title="修改领域" data-content="${content}">${value}</span>`;


      }
    }, {
      title: '课时',
      field: 'months',
      align: 'center',
      valign: 'middle',
      width: 80,
      sortable: true,
      formatter: function (value, row, index) {
        if (value != 0) value = value + '个月';
        else value = '-';

        var content = `<input id='input_hours_${row.id}' class='form-control update' type='text'>
          <button type='button' class='btn btn-success btn-sm btn-update' onclick='saveHours(${row.id})'>
          <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>
          <button type='button' class='btn btn-danger btn-sm btn-update' onclick='dismissHours(${row.id})'>
          <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>`;
        return `<span id="toggle_hours_${row.id}" class="toggle toggle-text" data-toggle="popover"
                title="修改课时（月）" data-content="${content}">${value}</span>`;
      }
    }, {
      title: '学费',
      field: 'fees',
      align: 'right',
      valign: 'middle',
      width: 80,
      sortable: true,
      formatter: function (value, row, index) {
        var result = '';
        arr = value.trim().split('');
        var j = 0;
        for (var i = arr.length - 1; i >= 0; i--) {
          result = arr[i] + result;
          j++;
          if (j % 3 === 0 && j !== arr.length) {
            result = ',' + result;
          }
        }
        result = '$' + result;
        var content = `<input id='input_fees_${row.id}' class='form-control update' type='text'>
          <button type='button' class='btn btn-success btn-sm btn-update' onclick='saveFees(${row.id})'>
          <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>
          <button type='button' class='btn btn-danger btn-sm btn-update' onclick='dismissFees(${row.id})'>
          <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>`;
        return `<span id="toggle_fees_${row.id}" class="toggle toggle-text" data-toggle="popover"
                title="修改学费" data-content="${content}">${result}</span>`;
      }
    }, {
        title: '添加人',
        field: 'author',
        align: 'left',
        valign: 'middle',
        width: 90,
        sortable: true,
      }, {
      title: '操作',
      field: 'id',
      align: 'center',
      valign: 'middle',
      width: 90,
      formatter: function (value, row, index) {
        const content =
          `<button type='button' class='btn btn-success btn-sm btn-update' onclick='deleteCourse(${row.id})' >
          <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>
          <button type='button' class='btn btn-danger btn-sm btn-update' onclick='dismissDelete(${row.id})'>
          <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>`;
        const swap =
          `<button class="btn btn-primary btn-sm btn-delete btn-op" onclick='swapCourse(${row.id})'><span class="glyphicon glyphicon-flash" aria-hidden="true"></span></button>`;
        var del = `<span id="toggle_delete_${row.id}" class="toggle" data-toggle="popover" title="确认删除吗" data-content="${content}">
          <button class="btn btn-danger btn-sm btn-delete btn-op"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></span>`;
        return swap + del;
      }
    }, ];


    $(function () {
      $("#search_keyword").keypress(function (e) {
        if (e.which == 13) {
          $("#search-btn").click();
          return false;
        }
      });

      const institutions = $.get('./util/courseOperation.php?op=5', function (res) {
        res = JSON.parse(res);
        STATESANDINST = res;
        $("#states")
          .empty()
          .append('<option value="0">全部州</option>').append(res.map(function (e) {
            return '<option value="' + e['id'] + '">' + e['name'] + '</option>';
          }).join(''))
          .change(function (op) {
            if ($(this).val() == 0) {
              $("#institutions")
                .empty()
                .append('<option value="0">全部院校</option>');
            } else {
              let inst = [];
              for (let i = 0; i < STATESANDINST.length; i++) {
                if (STATESANDINST[i].id == $(this).val()) {
                  inst = STATESANDINST[i].inst;
                  break;
                }
              }
              $("#institutions")
                .empty()
                .append('<option value="0">全部院校</option>')
                .append(inst.map(f => "<option value='" + f.id + "'>" + f.name + "</option>").join('')).change(refresh);
            }
            refresh();
          });
        $("#institutions")
          .empty()
          .append('<option value="0">全部院校</option>').change(refresh);
      });

      const level = $.get('./util/courseOperation.php?op=3', function (res) {
        res = JSON.parse(res);
        $("#level")
          .empty()
          .append('<option value="0">全部级别</option>')
          .append(res.map(s => "<option value='" + s.id + "'>" + s.name + "</option>").join(''))
          .change(refresh);
      });

      const fields = $.get('./util/courseOperation.php?op=2', function (res) {
        res = JSON.parse(res);
        FIELDS = res;
        $("#field_p")
          .empty()
          .append('<option value="0">全部领域</option>')
          .append(res.map(s => "<option value='" + s.id + "'>" + s.name + "</option>").join(''))
          .change(function (op) {
            if ($(this).val() <= 0) {
              $("#field_c")
                .empty()
                .append('<option value="0">全部子领域</option>')
                .hide();
            } else {
              let children = [];
              for (let i = 0; i < FIELDS.length; i++) {
                if (FIELDS[i].id == $(this).val()) {
                  children = FIELDS[i].children;
                  break;
                }
              }
              $("#field_c")
                .empty()
                .append('<option value="0">全部子领域</option>')
                .append(children.map(f => "<option value='" + f.id + "'>" + f.name + "</option>").join(''))
                .show();
            }
            refresh();
          });
        $("#field_c")
          .empty()
          .append('<option value="0">全部子领域</option>')
          .hide().change(refresh);
      });

      Promise.all([institutions, level, fields]).then(function (res) {
        refresh();
      });

    });


    function refresh() {
      $("#courseTab").bootstrapTable("destroy");
      $("#courseTab").bootstrapTable({
        method: "post",
        uniqueId: "id",
        url: "util/courseOperation.php?",
        pagination: true,
        pageSize: 20,
        pageList: [20, 40, 60, 100],
        sidePagination: "server",
        pageNumber: 1,
        contentType: "application/x-www-form-urlencoded",
        locale: 'zh-CN',
        // classes: "table",
        columns: column_course,
        queryParams: function (params) {
          params.keyword = $("#search_keyword").val().trim();
          params.state = $("#states").val().trim();
          params.inst = $("#institutions").val().trim();
          params.level = $("#level").val().trim();
          params.field_p = $("#field_p").val().trim();
          params.field_c = $("#field_c").val().trim();
          return params;
        },
        onPostBody: function () {
          $('[data-toggle="popover"]').popover({
            html: true,
          });
          $('[data-toggle="popover"]').on('show.bs.popover', function (e) {
            $('[data-toggle="popover"]:not(#' + e.currentTarget.id + ')').popover('hide');
          });
          $('.toggle-text').on('shown.bs.popover', function (e) {
            var matches = /^toggle_(\w+)_(\d+)/.exec(e.currentTarget.id);
            var action = matches[1],
              id = matches[2];
            $("#input_" + action + "_" + id).val(e.currentTarget.innerHTML.replace(/[个月,\$]/g, ''));
            $("input.update").keypress(function (e) {
              if (e.keyCode === 13) {
                if (action == "fees") saveFees(id);
                else if (action == "hours") saveHours(id);
              }
            });
          });
          $('.toggle-level').on('shown.bs.popover', function (e) {
            var matches = /^toggle_(\w+)_(\d+)/.exec(e.currentTarget.id);
            var action = matches[1],
              id = matches[2];
            const data = $("#courseTab").bootstrapTable('getRowByUniqueId', id)
            $.get('util/courseOperation?op=3', function (res) {
              res = JSON.parse(res);
              let html = "";
              $("#input_level_" + id).empty();
              res.forEach(t => {
                $("#input_level_" + id).append(`<option value='${t.id}'>${t.name}</option>`);
              });
              $("#input_level_" + id).val(data.level_id);
            });

          });

          $('.toggle-field').on('shown.bs.popover', function (e) {
            var matches = /^toggle_(\w+)_(\d+)/.exec(e.currentTarget.id);
            var action = matches[1],
              id = matches[2];
            const data = $("#courseTab").bootstrapTable('getRowByUniqueId', id)
            $("#input_field_p_" + id).html("<option value='0'>请选择领域</option>");
            $("#input_field_c_" + id).html("<option value='0'>请选择子领域</option>");

            FIELDS.forEach(e => {
              if (e.id > 0) $("#input_field_p_" + id).append(`<option value='${e.id}'>${e.name}</option>`);
            });

            $("#input_field_p_" + id).off('change').change(e => {
              const p_id = e.currentTarget.value;
              for (let i = 0; i < FIELDS.length; i++) {
                let field_p = FIELDS[i];
                if (field_p.id == p_id) {
                  $("#input_field_c_" + id).html("<option value='0'>请选择子领域</option>");
                  field_p.children.forEach(e => {
                    $("#input_field_c_" + id).append(`<option value='${e.id}'>${e.name}</option>`);
                  });
                  break;
                }
              }
            });
            if (data.field_id_p && data.field_id_c) {
              $("#input_field_p_" + id).val(data.field_id_p).change();
              $("#input_field_c_" + id).val(data.field_id_c);
            }
          });
        },
        rowStyle: function rowStyle(row, index) {
          var result = {
            css: {
              // 'height': '70px',
              'font-weight': 'bold',
              // 'font-size': '16px',
            }
          };
          if (row.status == -1)
            result.classes = "danger";
          return result;
        },
      });
    }

    function cellStyle(value) {
      var target = $("#search_keyword").val().trim();
      if (value == null || target.length == 0 || !value.includes(target)) return {};
      else {
        return {
          classes: "cell-found"
        };
      }
    }

    function dismissLevel(id) {
      $('#toggle_level_' + id).popover('hide');
    }

    function dismissDelete(id) {
      $('#toggle_delete_' + id).popover('hide');
    }

    function dismissFees(id) {
      $('#toggle_fees_' + id).popover('hide');
    }

    function dismissHours(id) {
      $('#toggle_hours_' + id).popover('hide');
    }

    function dismissField(id) {
      $('#toggle_field_' + id).popover('hide');
    }

    function saveFees(id) {
      var value = $("#input_fees_" + id).val();
      value = value.replace(/\s/g, "");
      if (!/^\d+$/.test(value)) {
        $("#input_fees_" + id).addClass('invalid');
        return false;
      } else {
        $("#input_fees_" + id).removeClass('invalid');
        $.post("util/courseOperation.php?op=6", {
            id: id,
            method: "fees",
            value: value
          },
          function (res) {
            res = JSON.parse(res);
            if (res.code == 0) {
              var result = '';
              arr = value.trim().split('');
              var j = 0;
              for (var i = arr.length - 1; i >= 0; i--) {
                result = arr[i] + result;
                j++;
                if (j % 3 === 0 && j !== arr.length) {
                  result = ',' + result;
                }
              }
              result = '$' + result;
              $("#input_fees_" + id).val(result);
              $('#toggle_fees_' + id).html(result);
              $('#toggle_fees_' + id).popover('hide');
            } else {
              layer.alert(res.msg, {
                icon: 2
              });
            }
          });
      }
    }

    function saveHours(id) {
      var value = $("#input_hours_" + id).val();
      value = value.replace(/\s/g, "");
      if (!/^\d+$/.test(value)) {
        $("#input_hours_" + id).addClass('invalid');
        return false;
      } else {
        $("#input_hours_" + id).removeClass('invalid');
        $.post("util/courseOperation.php?op=6", {
            id: id,
            method: "months",
            value: value
          },
          function (res) {
            res = JSON.parse(res);
            if (res.code == 0) {
              $("#input_hours_" + id).val(value + "个月");
              $('#toggle_hours_' + id).html(value + "个月");
              $('#toggle_hours_' + id).popover('hide');
            } else {
              layer.alert(res.msg, {
                icon: 2
              });
            }
          });
      }
    }

    function saveLevel(id) {
      var value = $("#input_level_" + id).val();
      $("#input_level_" + id).removeClass('invalid');
      $.post("util/courseOperation.php?op=6", {
          id: id,
          method: "level_id",
          value: value
        },
        function (res) {
          res = JSON.parse(res);
          if (res.code == 0) {
            $("#input_level_" + id).children().each((i, e) => {
              if (e.value == value) $('#toggle_level_' + id).html(e.innerHTML);
            });
            $("#input_level_" + id).val(value);
            $('#toggle_level_' + id).popover('hide');
          } else {
            layer.alert(res.msg, {
              icon: 2
            });
          }
        });
    }

    function saveField(id) {
      const field_p = $("#input_field_p_" + id).val();
      const field_c = $("#input_field_c_" + id).val();
      $("#input_field_p_" + id).removeClass('invalid');
      $("#input_field_c_" + id).removeClass('invalid');
      if (field_p < 1) {
        $("#input_field_p_" + id).addClass('invalid');
      }
      if (field_c < 1) {
        $("#input_field_c_" + id).addClass('invalid');
      }
      if (field_p < 1 || field_c < 1) {
        return;
      }
      $.post("util/courseOperation.php?op=6", {
          id: id,
          method: "field",
          field_p,
          field_c,
        },
        function (res) {
          res = JSON.parse(res);
          if (res.code == 0) {
            $('#toggle_field_' + id).popover('hide');
            FIELDS.forEach(f => {
              if (f.id == field_p) {
                f.children.forEach(c => {
                  if (c.id == field_c) $('#toggle_field_' + id).html(c.name);
                })
              }
            })
            // refresh();
          } else {
            layer.alert(res.msg, {
              icon: 2
            });
          }
        });
      $('#toggle_field_' + id).popover('hide');
    }

    function swapCourse(id) {
      $.post("util/courseOperation?op=8", {
          id: id,
        },
        function (res) {
          res = JSON.parse(res);
          if (res.code == 0) {
            const data = $("#courseTab").bootstrapTable('getRowByUniqueId', id);
            $("#courseTab").bootstrapTable('updateByUniqueId', {
              id,
              row: {
                ...data,
                status: -1 * data.status
              }
            });
          } else {
            layer.alert(res.msg, {
              icon: 2
            });
          }
        });
    }

    function deleteCourse(id) {
      $.post("util/courseOperation?op=7", {
          id: id,
        },
        function (res) {
          res = JSON.parse(res);
          if (res.code == 0) {
            $('#toggle_delete_' + id).popover('hide');
            $("#courseTab").bootstrapTable("removeByUniqueId", id);
          } else {
            layer.alert(res.msg, {
              icon: 2
            });
          }
        });
    }

    function FormCourse(inst_id, id) {
      current_scroll = {
        x: window.pageXOffset,
        y: window.pageYOffset
      };
      const url = `newcourse?inst_id=${inst_id}`;
      form = layer.open({
        type: 2,
        title: '添加课程',
        shade: 0.8,
        area: ['100%', '100%'],
        content: id ? `${url}&id=${id}` : url,
      });
    }
  </script>
</body>

</html>