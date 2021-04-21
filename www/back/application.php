<?php include "util/checksession.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>课程申请</title>
  <?php
getcss("ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css");
getcss("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.css");
getcss("css/magnific-popup.css", true);
getcss("js/layer/theme/default/layer.css", true);
?>
  <style>
    .container {
      width: 90%;
    }

    a.file {
      padding-left: 4px;
    }

    a.file.empty {
      color: red;
    }

    table {
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <h1>课程申请</h1>
    </header>
    <table class="table" id="appTab"></table>
  </div>

  <?php
getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/locale/bootstrap-table-zh-CN.min.js");
getjs("js/jquery.magnific-popup.min.js", true);
getjs("js/layer/layer.js", true);
?>
  <script>
    const columns_app = [{
      title: '申请时间',
      field: 'apply_time',
      align: 'center',
      valign: 'middle',
      width: 150,
      sortable: true,
      formatter: function (value, row, index) {
        return value.substring(0, 16);
      }
    }, {
      title: '申请人姓名',
      field: 'name',
      align: 'center',
      valign: 'middle',
      width: 100,
      sortable: true,
    }, {
      title: '出生年月',
      field: 'birth',
      align: 'center',
      width: 120,
      valign: 'middle',
      sortable: true,
      formatter: function (value, row, index) {
        let age = 0;
        const today = new Date();
        birth = value.split('-');
        age = today.getFullYear() - Number.parseInt(birth[0]);
        if (Number.parseInt(birth[1]) > today.getMonth())
          age--;
        return value + ` (${age}岁)`;
      }
    }, {
      title: '院校和课程',
      field: 'course',
      align: 'left',
      valign: 'middle',
      sortable: true,
      formatter: function (value, row, index) {
        return row.institution + "<br>" + value;
      }
    }, {
      title: '文件',
      field: 'id',
      align: 'center',
      valign: 'middle',
      width: 220,
      sortable: true,
      formatter: function (value, row, index) {
        const reg = /globecourse\/[0-9a-z]{32}\.pdf/g;
        let passport = row.passport.length > 0 ? `<a class='file ${reg.test(row.passport)?"pdf":"img"}' href='${row.passport}'>护照</a>` :
          `<a class='file empty' href=''>护照</a>`;
        let graduated = row.graduated.length > 0 ? `<a class='file ${reg.test(row.graduated)?"pdf":"img"}' href='${row.graduated}'>毕业证</a>` :
          `<a class='file empty' href=''>毕业证</a>`;
        let diploma = row.diploma.length > 0 ? `<a class='file ${reg.test(row.diploma)?"pdf":"img"}' href='${row.diploma}'>学位证</a>` :
          `<a class='file empty' href=''>学位证</a>`;
        let scoresheet = row.scoresheet.length > 0 ? `<a class='file ${reg.test(row.scoresheet)?"pdf":"img"}' href='${row.scoresheet}'>成绩单</a>` :
          `<a class='file empty' href=''>成绩单</a>`;
        let ielts_photo = row.ielts_photo.length > 0 ? `<a class='file ${reg.test(row.ielts_photo)?"pdf":"img"}' href='${row.ielts_photo}'>雅思</a>` :
          `<a class='file empty' href=''>雅思</a>`;
        return passport + graduated + diploma + scoresheet + ielts_photo;
      }
    }, {
      title: '状态',
      field: 'status',
      align: 'center',
      valign: 'middle',
      width: 80,
      sortable: true,
    }, ];

    function refresh() {
      $("#appTab").bootstrapTable("destroy");
      $("#appTab").bootstrapTable({
        method: "post",
        uniqueId: "id",
        url: "util/applicationOperation.php",
        pagination: true,
        pageSize: 20,
        pageList: [20, 40, 60, 100],
        sidePagination: "server",
        pageNumber: 1,
        contentType: "application/x-www-form-urlencoded",
        locale: 'zh-CN',
        columns: columns_app,
        // detailView: true,
        // detailViewByClick: false,
        // detailViewIcon: false,
        onPostBody: function () {
          $('a.file.img').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
          });

          $("a.file.pdf").magnificPopup({
            type: 'iframe',
            fixedBgPos: true,
            closeOnContentClick: true,
          });

          $("a.file.empty").click(e => {
            return false;
          });
        },
        // detailFormatter: function (index, row) {
        //   var str = '';
        //   str += '<div style="float:right;">';
        //   str +=
        //     `<button type="button" class="btn btn-success" onclick="FormCourse(${row.id})"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><b> 添加课程</b></button>`;
        //   str += '</div>';
        //   str +=
        //     '<ul class="nav nav-tabs" role="tablist"><li role="presentation" class="active"><a href="#detail_course" class="port-tab" data-toggle="tab" id="tab_detail_course">课程</a></li></ul>';
        //   str += '<div role="tabpanel" class="tab-pane active" id="detail_course">';
        //   str += `<table class='tbl-course' id='tbl_course_${row.id}'></table>`;
        //   str += '</div>';
        //   return str;
        // }
      });
    }


    $(() => {
      refresh();
    });
  </script>
</body>

</html>