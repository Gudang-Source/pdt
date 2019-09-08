$(function(){

  var url_getE = document.URL + '/getEmployee';
  var url_getEA = document.URL + '/getEmployeeAll';
  var url_getKasAll = document.URL + '/getKasAll';
  var url_getPosAll = document.URL + '/getPosAll';
  var url_getKas = document.URL + '/getKas';
  var url_getPos = document.URL + '/getPos';
  var url_getS = document.URL + '/getSchool';
  var url_getF = document.URL + '/getFamily';
  var url_getC = document.URL + '/getContract';
  var url_postData = document.URL + '/add';
  var url_postUpdate = document.URL + '/edit';


  $(document).on("click", ".btnSelect", function() {
    const id = $(this).data('id');
    var selNik = $('.selectNik'+id).text();
    $('#employee_nik').val(selNik);
    showEmployee();
  })

  $(document).on("click", ".btnSelectKas", function() {
    const id = $(this).data('id'); 
    var selKas = $('.selectKas'+id).text();
    $('#store_code').val(selKas);
    showKas(selKas);
  })

  $(document).on("click", ".btnSelectPos", function() {
    const id = $(this).data('id'); 
    var selPos = $('.selectPos'+id).text();
    $('#position_code').val(selPos);
    showPos(selPos);
  })

  $('#employee_nik').on('keyup', function (e) {
    if (e.which === 13) {
      showEmployee();
    }
  });

  $('#position_code').on('keyup', function (e) {
    if (e.which === 13) {
      var selPos = $('#position_code').val();
      showPos(selPos);
    }
  });

  $(document).on("click", "#search-buttonpos", function() {
    $('.tblPos').show();
    listPos();
  });

  $(document).on("input", "#search-inputpos", function() {
    $('.tblPos').show();
    listPos();
  });

  $('#store_code').on('keyup', function (e) {
    var searchKas = $('#store_code').val();
    if (e.which === 13) {
      showKas(searchKas)
    }
  });

  $(document).on("click", "#search-buttonkas", function() {
    var searchKas = $('#search-inputkas').val();
    $('.tblKas').show();
    listKas(searchKas);
  });

  $(document).on("input", "#search-inputkas", function() {
   var searchKas = $('#search-inputkas').val();
   $('.tblKas').show();
   listKas(searchKas);
 });

  $(document).on("click", "#search-button", function() {
    $('.tblKaryawan').show();
    listEmployee();
  });

  $(document).on("input", "#search-input", function() {
    $('.tblKaryawan').show();
    listEmployee();
  });


  // $(window).keypress(function(event) {
  //   if (!(event.which == 115 && event.ctrlKey) && !(event.which == 83)) return true;
  //   var confirmed =  confirm('Apakah anda akan menyimpan data ini?');
  //   if(confirmed){
  //     savedata();
  //     event.preventDefault();
  //     return false;
  //   }
  // });

  $('#btnSave').click(function() {
    var confirmed =  confirm('Apakah anda akan menyimpan data ini?');
    if(confirmed){
      savedata();
      event.preventDefault();
      return false;
    }
  });

  function savedata(){
    var data = $('#formData').serialize();
    var id = $('#employee_id').val();
    if(id == ''){
      var url = url_postData;
    } else {
      url = url_postUpdate
    }
    $.ajax({
      url: url,
      data: data,
      method: 'post',
      dataType: 'json',
      success: function(response) {
        if(response.status){
          flashData('success', response.result);
        } else {
          alert(response.result);
          flashData('error', response.result);
        }
      }
    });
  }

  function showEmployee(){
    const employee_nik = $('#employee_nik').val();
    $.ajax({
      url: url_getE,
      data: {employee_nik : employee_nik},
      method: 'post',
      dataType: 'json',
      success: function(data) {
        if(data != null) {
          $('.btnlistpos').hide();
          $('.btnlistkas').hide();
          $('#employee_id').val(data.employee_id);
          $('#employee_name').val(data.employee_name);
          $('#employee_pob').val(data.employee_pob);
          $('#employee_bdate').val(data.employee_bdate);
          $("input[value='" + data.employee_gender + "']").prop('checked', true);
          $('#employee_married').val(data.employee_married);
          $('#employee_mother').val(data.employee_mother);
          $('#employee_ktp').val(data.employee_ktp);
          $('#employee_phone').val(data.employee_phone);
          $('#employee_email').val(data.employee_email);
          $('#employee_current_address').val(data.employee_current_address);
          $('#employee_current_postcode').val(data.employee_current_postcode);
          $('#employee_current_village').val(data.employee_current_village);
          $('#employee_current_district').val(data.employee_current_district);
          $('#employee_id_address').val(data.employee_id_address);
          $('#employee_id_postcode').val(data.employee_id_postcode);
          $('#employee_id_village').val(data.employee_id_village);
          $('#employee_id_district').val(data.employee_id_district);
          $('#employee_id_district').val(data.employee_id_district);
          $('#employee_id_district').val(data.employee_id_district);
          $('#employee_join_date').val(data.employee_join_date);
          $('#employee_join_date').removeClass('datepicker', true);
          $('#employee_join_date').attr('disabled', true);
          $('#store_code').val(data.store_code);
          $('#store_code').attr('readonly', true);
          $('#store_name').val(data.store_name);
          $('#store_name').val(data.store_name);
          $('#employee_status').val(data.employee_status);
          $('#employee_status').val(data.employee_status);
          $('#position_code').val(data.position_code);
          $('#position_code').attr('readonly', true);
          $('#position_name').val(data.position_name);
          $('#grade_name').val(data.grade_name);
          $('#division_code').val(data.division_code);
          $('#division_name').val(data.division_name);
          $('#employee_acc_bank').val(data.employee_acc_bank);
          $('#employee_npwp').val(data.employee_npwp);
          $('#employee_no_bpjskes').val(data.employee_no_bpjskes);
          $('#employee_no_bpjstk').val(data.employee_no_bpjstk);
          $('#employee_tax_status').val(data.employee_tax_status);
          $('#employee_children').val(data.employee_children);
          $('#employee_family_card').val(data.employee_family_card);
          $('#employee_ordner').val(data.employee_ordner);
          $.ajax({
            url: url_getS,
            data: {employee_id : data.employee_id},
            method: 'post',
            dataType: 'html',
            success: function(res) {
              if(res != null){
                $('#divSchool').html(res);
                $('.prSch').hide();
              }
            }
          });
          $.ajax({
            url: url_getF,
            data: {employee_id : data.employee_id},
            method: 'post',
            dataType: 'html',
            success: function(res) {
              if(res != null){
                $('#divFamily').html(res);
                $('.prFam').hide();
              }

            }
          });
          $.ajax({
            url: url_getC,
            data: {employee_id : data.employee_id},
            method: 'post',
            dataType: 'html',
            success: function(res) {
              if(res != null){
                $('#divContract').html(res);
                $('.prCon').hide();
              }
            }
          });
        } else {
          alert('NIK Karyawan tidak ditemukan');
        }
      }
    });
}

function listEmployee(){
  var search = $('#search-input').val();
  $.ajax({
    url: url_getEA,
    data: {
      search: search
    },
    method: 'post',
    dataType: 'html',
    success: function(response){
      $('#dataKaryawan').html(response);
    }
  })
}

function listKas(searchKas){
  $.ajax({
    url: url_getKasAll,
    data: {
      searchKas: searchKas
    },
    method: 'post',
    dataType: 'html',
    success: function(response){
      $('#dataKas').html(response);
    }
  })
}

function listPos(){
  var searchPos = $('#search-inputpos').val();
  $.ajax({
    url: url_getPosAll,
    data: {
      searchPos: searchPos
    },
    method: 'post',
    dataType: 'html',
    success: function(response){
      $('#dataPosition').html(response);
    }
  })
}

function showKas(selKas){
  $.ajax({
    url: url_getKas,
    data: {store_code : selKas},
    method: 'post',
    dataType: 'json',
    success: function(data) {
      if(data != null){
        $('#stId').val(data.store_id);
        $('#store_name').val(data.store_name);
      } else {
        alert('Store Code tidak ditemukan');
        $('#stId').val('');
        $('#store_name').val('');
      }
    }
  });
}

function showPos(selPos){
  $.ajax({
    url: url_getPos,
    data: {position_code : selPos},
    method: 'post',
    dataType: 'json',
    success: function(data) {
      if(data != null){
        $('#posId').val(data.position_id);
        $('#position_name').val(data.position_name);
        $('#grade_name').val(data.grade_name);
        $('#division_code').val(data.division_code);
        $('#division_name').val(data.division_name);
      } else {
        alert('Kode Jabatan tidak ditemukan');
        $('#posId').val('');
        $('#position_id').val('');
        $('#position_name').val('');
        $('#grade_name').val('');
        $('#division_code').val('');
        $('#division_name').val('');
      }
    }
  });
}


function flashData(alert, msg){
  Command: toastr[alert](msg);
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
}

});