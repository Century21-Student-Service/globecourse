<?php include "util/checksession.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>添加课程</title>
  <?php

getcss("ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css");
getcss("ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
getcss("js/layer/theme/default/layer.css", true);
?>

  <style>
    .input-group {
      margin-top: 15px;
    }

    .input-select {
      display: inline-flex;
    }

    .nav-tabs {
      margin-top: 15px;
    }

    .invalid {
      border: solid 2px #F45866;
      box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px pink
    }
  </style>
</head>

<body>
  <div class='container'>
    <div class="input-group input-select">
      <div class="input-group-prepend">
        <label class="input-group-text" for="input_course_state_id">所在州</label>
      </div>
      <select class="custom-select disabled" id="input_course_state_id">
        <option>请选择州</option>
      </select>
    </div>
    <div class="input-group input-select">
      <div class="input-group-prepend">
        <label class="input-group-text" for="input_course_inst_id">所属学院</label>
      </div>
      <select class="custom-select disabled" id="input_course_inst_id">
        <option>请选择院校</option>
      </select>
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">课程名称</span>
      </div>
      <input type="text" class="form-control" aria-label="课程名称" id="input_course_name">
    </div>
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text">英文名称</span>
      </div>
      <input type="text" class="form-control" aria-label="英文名称" id="input_course_ename">
    </div>
    <div class="input-group input-select" style="width: 25%;min-width:250px;">
      <div class="input-group-prepend">
        <label class="input-group-text" for="input_course_field_p">所属领域</label>
      </div>
      <select class="custom-select" id="input_course_field_p">
        <option selected>澳大利亚</option>
      </select>
    </div>

    <div class="input-group input-select" style="width: 25%;min-width:250px;">
      <div class="input-group-prepend">
        <label class="input-group-text" for="input_course_field_c">子领域</label>
      </div>
      <select class="custom-select" id="input_course_field_c">
      </select>
    </div>

    <div class="input-group" style="width: 25%;min-width:250px;">
      <div class="input-group-prepend">
        <label class="input-group-text" for="input_course_level">级别</label>
      </div>
      <select class="custom-select" id="input_course_level">
      </select>
    </div>

    <div class="input-group " style="width: 20%; min-width:200px;">
      <div class="input-group-prepend">
        <span class="input-group-text">课时(月)</span>
      </div>
      <input type="text" class="form-control" aria-label="课时(月)" id="input_course_hours">
    </div>

    <div class="input-group " style="width: 20%; min-width:200px;">
      <div class="input-group-prepend">
        <span class="input-group-text">学费(AUD)</span>
      </div>
      <input type="text" class="form-control" aria-label="学费(AUD)" id="input_course_fees">
    </div>

    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item" style="display:none">
        <a class="nav-link " id="tab_intro" data-toggle="tab" href="#input_intro" role="tab" aria-controls="intro" aria-selected="true">简介</a>
      </li>
      <!-- <li class="nav-item" style="display:none">
        <a class="nav-link " id="tab_intro_en" data-toggle="tab" href="#input_intro_en" role="tab" aria-controls="intro" aria-selected="true">简介(英文)</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link active" id="tab_description" data-toggle="tab" href="#input_description" role="tab" aria-controls="description"
          aria-selected="true">详细介绍</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tab_description_en" data-toggle="tab" href="#input_description_en" role="tab" aria-controls="description_en"
          aria-selected="true">详细介绍(英文)</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade " role="tabpanel" aria-labelledby="tab_intro" id="input_intro"></div>
      <div class="tab-pane fade " role="tabpanel" aria-labelledby="tab_intro_en" id="input_intro_en"></div>
      <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="tab_description" id="input_description"></div>
      <div class="tab-pane fade" role="tabpanel" aria-labelledby="tab_description_en" id="input_description_en"></div>
    </div>

    <div style="float: right; margin-top: 15px;">
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
getjs("js/wangEditor.min.js", true);
getjs("js/layer/layer.js", true);
?>
  <script>
    const E = window.wangEditor
    const editor_intro = new E(document.getElementById('input_intro'))
    editor_intro.config.placeholder = '请输入简介';
    editor_intro.create();
    const editor_description = new E(document.getElementById('input_description'))
    editor_description.config.placeholder = '请输入详细介绍';
    editor_description.create();
    const editor_intro_en = new E(document.getElementById('input_intro_en'))
    editor_intro_en.config.placeholder = '请输入简介(英文)';
    editor_intro_en.create();
    const editor_description_en = new E(document.getElementById('input_description_en'))
    editor_description_en.config.placeholder = '请输入详细介绍(英文)';
    editor_description_en.create();
    const urlParams = new URLSearchParams(window.location.search);
    const inst_id = urlParams.get('inst_id');
    const course_id = urlParams.get('id');
    let fields = [];

    let data_old = {},
      data_new = {};

    function sameValue(valueA, valueB) {
      if (valueA == null) valueA = "";
      if (valueB == null) valueB = "";
      valueA = valueA.trim();
      valueB = valueB.trim();
      return valueA == valueB;
    }

    $(function () {
      let STATESANDINST = [];
      let pro_inst;
      const pro_levels = $.get('util/courseOperation.php?op=3', function (res) {
        res = JSON.parse(res);
        $("#input_course_level").html(res.map(s => "<option value='" + s.id + "'>" + s.name + "</option>").join(''));
      });
      const pro_field = $.get('util/courseOperation.php?op=2', function (res) {
        res = JSON.parse(res);
        $("#input_course_field_p").html(res.map(s => "<option value='" + s.id + "'>" + s.name + "</option>").join(''));
        $("#input_course_field_c").html(res[0].children.map(s => "<option value='" + s.id + "'>" + s.name + "</option>").join(''));
        $("#input_course_field_p").change(e => {
          const c_id = e.currentTarget.value;
          res.forEach(e => {
            if (e.id == c_id) {
              $("#input_course_field_c").html(e.children.map(s => "<option value='" + s.id + "'>" + s.name + "</option>").join(''));
              return;
            }
          });
        })
      });

      pro_inst = $.get('./util/courseOperation.php?op=5', function (res) {
        res = JSON.parse(res);
        STATESANDINST = res;
        $("#input_course_state_id")
          .empty()
          .append('<option value="0">请选择州</option>').append(res.map(function (e) {
            return '<option value="' + e['id'] + '">' + e['name'] + '</option>';
          }).join(''))
          .change(function (op) {
            if ($(this).val() == 0) {
              $("#input_course_inst_id").html('<option value="0">请选择院校</option>');
            } else {
              let inst = [];
              for (let i = 0; i < STATESANDINST.length; i++) {
                if (STATESANDINST[i].id == $(this).val()) {
                  inst = STATESANDINST[i].inst;
                  break;
                }
              }
              $("#input_course_inst_id")
                .html('<option value="0">请选择院校</option>')
                .append(inst.map(f => "<option value='" + f.id + "'>" + f.name + "</option>").join(''))
                .off('change')
                .change(e => {
                  if (e.currentTarget.value != 0) {
                    $(e.currentTarget).removeClass('invalid');
                  }
                });
            }
          });
        // if (id != 0)
        //   $.get('util/institutionOperation.php?op=8&courseid=' + course_id, function (res) {
        //     res = JSON.parse(res);
        //     $("#input_course_state_id").val(res.state_id);
        //     $("#input_course_state_id").change();
        //     // setTimeout(e => $("#input_course_inst_id").val(res.id), 1000);
        //   });
      });

      // pro_fill_inst = $.get('util/institutionOperation.php?op=8&courseid=' + course_id, function (res) {
      //   res = JSON.parse(res);
      //   $("#input_course_state_id").val(res.state_id);
      //   $("#input_course_inst_id").val(res.id);
      //   // $("#input_course_state_id").html(`<option value='${res.state_id}'>${res.state}</option>`);
      //   // $("#input_course_inst_id").html(`<option value='${res.id}'>${res.name}</option>`);
      // });



      Promise.all([pro_levels, pro_inst, pro_field]).then(function (res) {
        // Promise.all([pro_levels, pro_field]).then(function (res) {
        if (course_id)
          $.get('util/courseOperation.php?op=1&id=' + course_id, function (res) {
            res = JSON.parse(res);
            data_old = res;
            $("#input_course_name").val(res.name);
            $("#input_course_ename").val(res.name_en);
            $("#input_course_field_p").val(res.field_p).change();
            $("#input_course_field_c").val(res.field_c);
            $("#input_course_level").val(res.level_id);
            $("#input_course_hours").val(res.months);
            $("#input_course_fees").val(res.fees);
            $("#input_course_state_id").val(res.state_id);
            $("#input_course_state_id").change();
            $("#input_course_inst_id").val(res.inst_id);
            editor_description.txt.html(res.description || "");
            editor_description_en.txt.html(res.description_en || "");
            editor_intro.txt.html(res.intro || "");
            editor_intro_en.txt.html(res.intro_en || "");
          });
        if (inst_id) {
          $.get('util/institutionOperation.php?op=4&instid=' + inst_id, function (res) {
            res = JSON.parse(res);
            $("#input_course_state_id").val(res.state_id);
            $("#input_course_state_id").change();
            $("#input_course_inst_id").val(res.id);
          });
        }
      });
      $("#input_course_name").keyup(e => {
        if (e.currentTarget.value.trim().length > 0) {
          $(e.currentTarget).removeClass("invalid");
        }
      });

      $("#input_course_hours").keyup(e => {
        const reg = /^[\d-]+$/g;
        if (!reg.test(e.currentTarget.value)) $(e.currentTarget).addClass("invalid");
        else $(e.currentTarget).removeClass("invalid");
      });

      $("#input_course_fees").keyup(e => {
        const reg = /^\d+$/g;
        // console.log(e.currentTarget.value);
        if (!reg.test(e.currentTarget.value)) $(e.currentTarget).addClass("invalid");
        else $(e.currentTarget).removeClass("invalid");
      });

      $("#btn_save").click(e => {
        data_new.id = data_old.id;
        data_new.description = editor_description.txt.html().trim();
        data_new.intro = editor_intro.txt.html().trim();
        data_new.description_en = editor_description_en.txt.html().trim();
        data_new.intro_en = editor_intro_en.txt.html().trim();
        data_new.inst_id = $("#input_course_inst_id").val();
        data_new.name = $("#input_course_name").val().trim();
        data_new.name_en = $("#input_course_ename").val().trim();
        data_new.field_id_p = $("#input_course_field_p").val();
        data_new.field_id_c = $("#input_course_field_c").val();
        data_new.level_id = $("#input_course_level").val();
        data_new.months = $("#input_course_hours").val();
        data_new.fees = $("#input_course_fees").val();

        let error = false;

        if (data_new.inst_id == 0) {
          $("#input_course_inst_id").addClass('invalid');
          error = true;
        }

        if (data_new.name == '') {
          $("#input_course_name").addClass('invalid');
          error = true;
        }

        if (!(/^[\d-]+$/g).test(data_new.months)) {
          $("#input_course_hours").addClass('invalid');
          error = true;
        }

        if (!(/^\d+$/g).test(data_new.fees)) {
          $("#input_course_fees").addClass('invalid');
          error = true;
        }

        if (error) {
          layer.alert('请输入必要的信息', {
            icon: 0
          });
          return;
        }

        if (sameValue(data_new.name, data_old.name)) data_new.name = null;
        if (sameValue(data_new.name_en, data_old.name_en)) data_new.name_en = null;
        if (sameValue(data_new.field_id_p, data_old.field_p)) data_new.field_id_p = null;
        if (sameValue(data_new.field_id_c, data_old.field_c)) data_new.field_id_c = null;
        if (sameValue(data_new.description, data_old.description)) data_new.description = null;
        if (sameValue(data_new.intro, data_old.intro)) data_new.intro = null;
        if (sameValue(data_new.description_en, data_old.description_en)) data_new.description_en = null;
        if (sameValue(data_new.intro_en, data_old.intro_en)) data_new.intro_en = null;
        if (sameValue(data_new.level_id, data_old.level_id)) data_new.level_id = null;
        if (sameValue(data_new.months, data_old.months)) data_new.months = null;
        if (sameValue(data_new.fees, data_old.fees)) data_new.fees = null;

        if (
          data_new.name == null &&
          data_new.name_en == null &&
          data_new.field_id_p == null &&
          data_new.field_id_c == null &&
          data_new.name == null &&
          data_new.intro == null &&
          data_new.intro_en == null &&
          data_new.description == null &&
          data_new.description_en == null &&
          data_new.level_id == null &&
          data_new.months == null &&
          data_new.fees == null
        ) {
          parent.layer.close(parent.form);
          parent.scrollTo(parent.current_scroll.x, parent.current_scroll.y);
          return;
        }
        // console.log("here", JSON.stringify(data_new));
        // return;
        $.post('util/courseOperation.php?op=4', JSON.stringify(data_new), res => {
          try {
            res = JSON.parse(res);
          } catch (e) {
            layer.alert('未知错误：' + res, {
              title: "错误",
              icon: 2
            });
            // console.log(res);
            return;
          }
          if (res.code == 0) {
            parent.layer.close(parent.form);
            parent.scrollTo(parent.current_scroll.x, parent.current_scroll.y);
            // parent.refresh();
          } else {
            layer.alert(res.msg, {
              title: "错误",
              icon: 2
            });
            return;
          }
        });
      });

      $("#btn_close").click(e => {
        data_new.id = data_old.id;
        data_new.description = editor_description.txt.html().trim();
        data_new.intro = editor_intro.txt.html().trim();
        data_new.description_en = editor_description_en.txt.html().trim();
        data_new.intro_en = editor_intro_en.txt.html().trim();
        data_new.name = $("#input_course_name").val().trim();
        data_new.name_en = $("#input_course_ename").val().trim();
        data_new.field_id_p = $("#input_course_field_p").val();
        data_new.field_id_c = $("#input_course_field_c").val();
        data_new.level_id = $("#input_course_level").val();
        data_new.hours = $("#input_course_hours").val();
        data_new.fees = $("#input_course_fees").val();

        if (data_old.id) {
          if (
            !sameValue(data_new.name, data_old.name) ||
            !sameValue(data_new.name_en, data_old.name_en) ||
            !sameValue(data_new.field_id_p, data_old.field_p) ||
            !sameValue(data_new.field_id_c, data_old.field_c) ||
            !sameValue(data_new.description, data_old.description) ||
            !sameValue(data_new.intro, data_old.intro) ||
            !sameValue(data_new.level_id, data_old.level_id) ||
            !sameValue(data_new.hours, data_old.hours) ||
            !sameValue(data_new.fees, data_old.fees)
          ) {
            if (!sameValue(data_new.name, data_old.name)) console.log('name', data_new.name, data_old.name);
            if (!sameValue(data_new.name_en, data_old.name_en)) console.log('name_en', data_new.name_en, data_old.name_en);
            if (!sameValue(data_new.field_id_p, data_old.field_p)) console.log('field_id_p', data_new.field_id_p, data_old.field_p);
            if (!sameValue(data_new.field_id_c, data_old.field_c)) console.log('field_id_c', data_new.field_id_c, data_old.field_c);
            // if (!sameValue(data_new.description, data_old.description)) console.log('description', data_new.description, data_old.description);
            if (!sameValue(data_new.intro, data_old.intro)) console.log('intro', data_new.intro, data_old.intro);
            if (!sameValue(data_new.level_id, data_old.level_id)) console.log('level_id', data_new.level_id, data_old.level_id);
            if (!sameValue(data_new.hours, data_old.hours)) console.log('hours', data_new.hours, data_old.hours);
            if (!sameValue(data_new.fees, data_old.fees)) console.log('fees', data_new.fees, data_old.fees);
            layer.confirm('关闭后修改不会被保存，确定关闭？', {
              btn: ['关闭', '取消'] //按钮
            }, function () {
              parent.layer.close(parent.form);
              parent.scrollTo(parent.current_scroll.x, parent.current_scroll.y);
              return;
            });
          } else {
            parent.layer.close(parent.form);
            parent.scrollTo(parent.current_scroll.x, parent.current_scroll.y);
          }
        } else {
          parent.layer.close(parent.form);
          parent.scrollTo(parent.current_scroll.x, parent.current_scroll.y);
        }
      });
    });
  </script>
</body>

</html>