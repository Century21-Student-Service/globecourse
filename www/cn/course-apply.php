<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="custom-code__js/intltelinput/css/intlTelInput.min.css" />
  <script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script type='text/javascript' src='custom-code__js/intltelinput/js/intlTelInput.min.js'></script>

  <title>Course Apply</title>
  <style>
    .container {
      width: 570px;
    }

    h1 {
      margin: 18px 0;
      text-align: center;
    }

    .footer {
      margin: 15px auto;
      width: 200px;
    }

    .input-group {
      margin-top: 15px;
    }

    .input-select {
      display: inline-flex;
    }

    table.tbl-app {
      width: 100%;
      border: none;
    }

    table.tbl-upload-image {
      width: 100%;
      border: none;
      margin-top: 40px;
      text-align: center;
    }

    .app-title {
      font-weight: 600;
      padding-right: 14px;
      height: 50px;
      min-width: 160px;
      text-align: right;
      width: 30%;
    }

    .img-add {
      width: 100px;
      height: 141px;
      color: rgb(201, 216, 219);
      border: dashed 4px;
      margin: auto;
      transition: all .3s ease;
    }

    .img-add-alt {
      display: none;
    }

    .img-add:hover {
      opacity: .7;
    }

    .img-add:hover .img-add-alt {
      display: block;
    }

    .img-add.hide {
      display: none;
    }

    .progress {
      width: 100px;
      height: 25px;
      margin: auto;
      margin-top: 15px;
      transition: all .3s ease;
    }

    .progress.hide {
      display: none;
      transition: all .3s ease;
    }

    span.uploading {
      color: white;
      margin: auto;
      font-size: medium;
      font-weight: 500;
      position: absolute;
      margin-top: 12px;
      margin-left: 28px;
    }

    .file-upload {
      display: none;
    }

    .upload-preview {
      width: 100px;
      height: 141px;
    }

    .upload-preview.hide {
      display: none;
    }

    .star {
      color: red;
      /* font-size: 12px; */
    }

    input.error {
      border-color: #ff8080 !important;
      box-shadow: 0 0 0 0.2rem rgb(255 0 70 / 25%) !important;
    }

    input.error :focus {
      border-color: #ff8080 !important;
      box-shadow: 0 0 0 0.2rem rgb(255 0 70 / 25%) !important;
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <h1>个人资料</h1>
    </header>

    <table class="tbl-app">
      <tr>
        <td class="app-title right">申请院校</td>
        <td class="left"><input type="text" class="form-control" aria-label="申请院校" id="input_inst">
          <input type="hidden" class='for-submit' id="input_inst_id">
        </td>
        <td class="star">*</td>
      </tr>
      <tr>
        <td class="app-title right">申请课程</td>
        <td class="left">
          <input type="text" class="form-control" aria-label="申请课程" id="input_course">
          <input type="hidden" class='for-submit' id="input_course_id">
        </td>
        <td class="star">*</td>
      </tr>
      <tr>
        <td class="app-title right">申请人姓名</td>
        <td class="left"><input type="text" class="form-control for-submit" aria-label="申请人姓名" id="input_name"></td>
        <td class="star">*</td>
      </tr>
      <tr>
        <td class="app-title right">出生年月</td>
        <td class="left">
          <select class="custom-select for-submit" id="input_dob_year" style="width: 53%;min-width:90px;">
          </select>
          <select class="custom-select for-submit" id="input_dob_month" style="width: 45%;min-width:90px;">
          </select>
        </td>
        <td class="star">*</td>
      </tr>
      <tr>
        <td class="app-title right">联系电话</td>
        <td class="left"><input type="text" class="form-control for-submit" aria-label="联系电话" id="input_phone"></td>
        <td class="star">*</td>
      </tr>
      <tr>
        <td class="app-title right">电子邮件</td>
        <td class="left"><input type="text" class="form-control for-submit" aria-label="电子邮件" id="input_email"></td>
        <td class="star">*</td>
      </tr>
      <tr>
        <td class="app-title right">最高学历或在读年级</td>
        <td class="left">
          <select class="custom-select for-submit" id="input_app_level" style="width: 53%;min-width:90px;">
          </select>
          <select class="custom-select for-submit" id="input_app_grade" style="width: 45%;min-width:90px;">
          </select>
        </td>
      </tr>
      <tr>
        <td class="app-title right">毕业或在读院校名称</td>
        <td class="left"><input type="text" class="form-control for-submit" aria-label="毕业或在读院校名称" id="input_entry_inst"></td>
      </tr>
      <tr>
        <td class="app-title right">雅思分数</td>
        <td class="left"><input type="text" class="form-control for-submit" aria-label="雅思分数" id="input_ielts"></td>
      </tr>
    </table>

    <table class="tbl-upload-image">
      <tr>
        <th>护照</th>
        <th>学历毕业证书</th>
        <th>学位证</th>
        <th>毕业成绩单</th>
        <th>雅思成绩单</th>
      </tr>
      <tr>
        <td class="td-upload">
          <img src="/a.png" alt="" class="upload-preview hide" id="upload_preview_passport">
          <div class="img-add img-add-passport" onclick="document.getElementById('file_upload_img_passport').click();">
            <i class="fa fa-plus" aria-hidden="true" style="font-size:90px;margin-top: 22px;"></i>
            <div class="img-add-alt">点击上传</div>
          </div>
          <div class="progress position-relative progress-upload hide" id="progress_passport">
            <div class="progress-bar" id="img_progress_bar_passport" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            <span class="uploading">上传中</span>
          </div>
          <input class="file-upload pics-upload" id="file_upload_img_passport" data-type="passport" type="file" accept="image/*">
          <input class="file-upload for-submit" id="input_img_passport" type="hidden">
        </td>

        <td class="td-upload">
          <img src="/a.png" alt="" class="upload-preview hide" id="upload_preview_graduated">
          <div class="img-add img-add-graduated" onclick="document.getElementById('file_upload_img_graduated').click();">
            <i class="fa fa-plus" aria-hidden="true" style="font-size:90px;margin-top: 22px;"></i>
            <div class="img-add-alt">点击上传</div>
          </div>
          <div class="progress position-relative progress-upload hide" id="progress_graduated">
            <div class="progress-bar" id="img_progress_bar_graduated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            <span class="uploading">上传中</span>
          </div>
          <input class="file-upload pics-upload" id="file_upload_img_graduated" data-type="graduated" type="file" accept="image/*">
          <input class="file-upload for-submit" id="input_img_graduated" type="hidden">
        </td>

        <td class="td-upload">
          <img src="/a.png" alt="" class="upload-preview hide" id="upload_preview_diploma">
          <div class="img-add img-add-diploma" onclick="document.getElementById('file_upload_img_diploma').click();">
            <i class="fa fa-plus" aria-hidden="true" style="font-size:90px;margin-top: 22px;"></i>
            <div class="img-add-alt">点击上传</div>
          </div>
          <div class="progress position-relative progress-upload hide" id="progress_diploma">
            <div class="progress-bar" id="img_progress_bar_diploma" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            <span class="uploading">上传中</span>
          </div>
          <input class="file-upload pics-upload" id="file_upload_img_diploma" data-type="diploma" type="file" accept="image/*">
          <input class="file-upload for-submit" id="input_img_diploma" type="hidden">
        </td>

        <td class="td-upload">
          <img src="/a.png" alt="" class="upload-preview hide" id="upload_preview_score">
          <div class="img-add img-add-score" onclick="document.getElementById('file_upload_img_score').click();">
            <i class="fa fa-plus" aria-hidden="true" style="font-size:90px;margin-top: 22px;"></i>
            <div class="img-add-alt">点击上传</div>
          </div>
          <div class="progress position-relative progress-upload hide" id="progress_score">
            <div class="progress-bar" id="img_progress_bar_score" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            <span class="uploading">上传中</span>
          </div>
          <input class="file-upload pics-upload" id="file_upload_img_score" data-type="score" type="file" accept="image/*">
          <input class="file-upload for-submit" id="input_img_scoresheet" type="hidden">
        </td>

        <td class="td-upload">
          <img src="/a.png" alt="" class="upload-preview hide" id="upload_preview_ielts">
          <div class="img-add img-add-ielts" onclick="document.getElementById('file_upload_img_ielts').click();">
            <i class="fa fa-plus" aria-hidden="true" style="font-size:90px;margin-top: 22px;"></i>
            <div class="img-add-alt">点击上传</div>
          </div>
          <div class="progress position-relative progress-upload hide" id="progress_ielts">
            <div class="progress-bar" id="img_progress_bar_ielts" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            <span class="uploading">上传中</span>
          </div>
          <input class="file-upload pics-upload" id="file_upload_img_ielts" data-type="ielts" type="file" accept="image/*">
          <input class="file-upload for-submit" id="input_img_ielts" type="hidden">
        </td>
      </tr>
    </table>


    <div class="footer">
      <button type="button" class="btn btn-primary" id='btn_save'>
        提交申请
      </button>
      <button type="button" class="btn btn-default" style="width: 90px;" id='btn_close'>
        关闭
      </button>
    </div>
  </div>
  <script>
    let entry_levels = [];
    const iti = window.intlTelInput(document.querySelector("#input_phone"), {
      separateDialCode: true,
      preferredCountries: ['cn', 'hk', 'tw', 'au', 'nz'],
    });

    $("#btn_save").click(e => {
      const vn = validName(),
        vm = validEmail(),
        vp = validPhone();
      if (vn && vm && vp) {
        let data = {};
        $(".for-submit").each((i, e) => {
          data[$(e).attr("id").replace(/^input_/g, '')] = $(e).val();
        });
        data.birth = data.dob_year + "-" + data.dob_month.padStart(2, '0');
        data.entry_level = data.app_grade;
        data.lang = 'CN';
        delete data.app_level;
        delete data.app_grade;
        delete data.dob_year;
        delete data.dob_month;
        $.post('util/application?op=2', JSON.stringify(data), res => {
          try {
            res = JSON.parse(res);
          } catch (e) {
            parent.layer.alert('未知错误', {
              title: "错误",
              icon: 2
            });
            console.warn('未知错误：' + res.msg);
            return;
          }
          if (res.code == 0) {
            parent.layer.alert('已收到您的申请\n我们已经给您发了一封确认邮件\n同时我们的工作人员会很快联系您', {
              title: "成功",
              icon: 1
            });
            parent.layer.close(parent.form);
          } else {
            parent.layer.alert('未知错误：' + res.msg, {
              title: "错误",
              icon: 2
            });
          }
        });
      } else {
        parent.layer.alert("请输入正确的姓名、电话、电子邮件", {
          title: "错误",
          icon: 0
        });
        return false;
      }
    });

    $("#btn_close").click(e => parent.layer.close(parent.form));

    $("#input_phone").keyup(validPhone);
    $("#input_email").keyup(validEmail);



    $("#input_app_level").change(e => {
      const level = e.currentTarget.value;
      let grade = entry_levels[level];
      grade = grade.map(v => `<option value='${v.code}'>${v.grade}</option>`).join('');
      $("#input_app_grade").html(grade);
    });

    $(".pics-upload").on("change", function (e) {
      if (this.files && this.files[0]) {
        const MAX_SIZE = 1024 * 1024 * 5;
        const file = this.files[0];
        if (file.size > MAX_SIZE) {
          parent.layer.alert("文件太大，请选择小于5M的文件", {
            title: "错误",
            icon: 2
          });
          return;
        }
        const key = this.id.substring(this.id.lastIndexOf("_") + 1);
        $(".img-add-" + key).addClass("hide")
        $("#progress_" + key).removeClass("hide");
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#upload_preview_' + key).attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
        uploadFile(file, function (res, error) {
          if (error) {
            parent.layer.alert('未知错误：' + error, {
              title: "错误",
              icon: 2
            });
            return;
          }
          try {
            res = JSON.parse(res);
          } catch (e) {
            parent.layer.alert('未知错误：' + res, {
              title: "错误",
              icon: 2
            });
            console.log(res);
            return;
          }
          if (res.code == 0) {
            $('#upload_preview_' + key).removeClass('hide');
            $("#progress_" + key).addClass("hide");
            $("#input_img_" + key).val(res.msg);
          } else {
            $("#progress_" + key).addClass("hide");
            $(".img-add-" + key).removeClass("hide")
            parent.layer.alert('错误：' + res.msg, {
              title: "错误",
              icon: 2
            });
          }
        }, "img_progress_bar_" + key);
      }
    });

    fillDobYearMonth();
    fillEntryLevels();
    fillInstitutionAndCourse();

    function validName() {
      if ($("#input_name").val().length === 0) {
        $("#input_name").addClass('error');
        return false;
      } else {
        $("#input_name").removeClass('error');
        return true;
      }
    }

    function validEmail() {
      const reg =
        /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
      if (!reg.test($("#input_email").val())) {
        $("#input_email").addClass('error');
        return false;
      } else {
        $("#input_email").removeClass('error');
        return true;
      }
    }

    function validPhone() {
      const reg = /^[\d\s]+$/;
      if (!reg.test($("#input_phone").val())) {
        $("#input_phone").addClass('error');
        return false;
      } else {
        $("#input_phone").removeClass('error');
        return true;
      }
    }

    function uploadFile(file, callback, progressId) {
      var formData = new FormData();
      formData.append("fileupload", file);
      $.ajax({
        url: 'util/application?op=1',
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        xhr: function () {
          var xhr = new XMLHttpRequest();
          if (progressId)
            xhr.upload.addEventListener("progress", function (evt) {
              if (evt.lengthComputable) {
                var percentComplete = Math.round(evt.loaded / evt.total * 100);
                percentComplete += '%';
                $("#" + progressId).css("width", percentComplete);
              }
            }, false);
          return xhr;
        },
        success: function (res) {
          callback(res);
        },
        error: function (xhr, status, error) {
          callback(null, error);
        },
        complete: function () {
          if (progressId)
            $("#" + progressId).css("width", "0%");
        }
      });
    }

    function fillDobYearMonth() {
      let dob_years = [],
        dob_months = [];
      const thisyear = (new Date()).getFullYear();
      for (let i = thisyear - 1; i > thisyear - 100; i--) {
        dob_years.push(i);
      }
      for (let i = 1; i <= 12; i++) {
        dob_months.push(i);
      }
      dob_years = dob_years.map(v => `<option value='${v}'>${v}年</option>`).join('');
      dob_months = dob_months.map(v => `<option value='${v}'>${v}月</option>`).join('');
      $("#input_dob_year").append(dob_years);
      $("#input_dob_month").append(dob_months);
    }

    function fillEntryLevels() {
      $.get('util/application', res => {
        entry_levels = JSON.parse(res);
        let keys = Object.keys(entry_levels);
        keys = keys.map(v => `<option value='${v}'>${v}</option>`).join('');
        $("#input_app_level").append(keys);
        $("#input_app_level").change();
      });
    }

    function fillInstitutionAndCourse() {
      const urlParams = new URLSearchParams(window.location.search);
      const course_id = urlParams.get('cid');
      $.get('util/application?op=3&cid=' + course_id, res => {
        res = JSON.parse(res);
        res = res.course;
        $("#input_inst").val(res.institution);
        $("#input_course").val(res.course);
        $("#input_inst_id").val(res.inst_id);
        $("#input_course_id").val(res.id);
        $("#input_inst").attr("disabled", "disabled");
        $("#input_course").attr("disabled", "disabled");
      });
    }
  </script>
</body>

</html>