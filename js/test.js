//kiếm tra mã y tế và sdt
function KiemTra() {
  var dataclient = {
    maYte: $("#MaYTe").val(),
    sdt: $("#sdt").val()
  }
  var yte = dataclient.maYte;
  var so = dataclient.sdt;

  //console.log(dataclient.maYte +"  "+ dataclient.sdt);

  if (yte.length != 0) {
    if (so.length == 10) {
      for (var i in so) {
        if (so[0] == 0) {
          //console.log("ok");
          // location.href = "login.html";
          KTraTK(dataclient);
        }
      }
    } else {
      alert("Số điện thoại nhập sai");
      document.getElementById("sdt").value = "";
    }
  } else {
    alert("Mã y tế không được bỏ trống");
  }
}

function KTraTK (dataclient) {
      dataclient.event = "getData";
      //console.log(dataclient);
  
      queryDataPost("php/api.php", dataclient, function (res) {
          var data = res.items;
          var test = Object.keys(data).length;
         // console.log(test);
  
          if(test == 0){
              alert("bạn chưa có tài khoản");
          }else{
              for (var x in data) {
                  var list = data[x];
                  console.log(list.maYTe + " " + list.sdt + " " + list.otp);

                  var UploadData = {
                      event: "inputYTE",
                      sdt: $("#sdt").val(),
                      apikey: list.APIkey,
                      secretkey: list.Secretkey,
                      brand: list.brand,
                      otp: list.otp,
                  }
                  // console.log(UploadData);
                  
                  // location.href = "login.html"
          
                  queryDataPost("php/api.php", UploadData, function (res) {
                      // console.log(res);
                      if (res.success == 1) {
                          //alert("Thêm thành công");
                          location.href = "login.php?sdt="+ $("#sdt").val()
                          + "&maYte=" + $("#MaYTe").val();
                      }
                      else {
                          //alert("Thêm thất bại");
                      }
                  });
              }
          }
      });
};

// kiểm tra thông tin để xác nhận thông tin đang nhập
$(document).ready(function () {
  $("#Complete").on("click", function () {
    var dataclient = {
      event: "finalTest",
      otp: $("#MaOTP").val(),
      maYte: $("#ktmaYte").val(),
      sdt: $("#ktsdt").val(),
    };
    //console.log(dataclient);

    queryDataPost("php/api.php", dataclient, function (res) {
      //console.log(res);
      if (res < 1) {
        //console.log(res);
        alert("Sai mã OTP");
      } else if (res >= 1) {
        //console.log(res);
        //alert("Đăng nhập thành công");
        localStorage.setItem("idYTE",dataclient.maYte);
        localStorage.setItem('sdt',dataclient.sdt);
        location.href="watchPDF/index.html";
      }
    });
  });
});
