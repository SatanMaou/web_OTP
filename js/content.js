//hiển thị danh sách bệnh án
function medical() {
  var dataclient = {
    event: "getPDF",
    maYte: localStorage.getItem("idYTE")
  };
  queryDataPost("../php/api.php", dataclient, function (jsonData) {
    var data = jsonData.items;
    let htmls = "";
    
    if (jsonData == 0) {
      window.location = "../";
    } else {
      for (i in data) {
        htmls +=
          "" +
          "<tr onclick='watchFile(`" + data[i].pathPDF + "`)'>" +
          '<td class="center width-stt">'+ (parseInt(i)+1) +'</td>' +
          "<td>" +
          // '   <a href="watchPDF.html" onclick="watchFile()">'+
          '    <div class="d-flex align-items-center sp-patient">' +
          '        <div><i class="bx bxs-file-pdf me-2 font-24 text-danger"></i>' +
          "        </div>" +
          '        <div class="font-weight-bold text-danger">' + data[i].benhAn +"</div>" +
          "    </div>" +
          // '   </a>' +
          "</td>" +
          "<td>" + data[i].time +"</td>" +
          "</tr>";
      }
      $(".set-medical-information").html(htmls);
    }
  });
}

medical();

//mở đúng file PDF
function watchFile(pathPDF){
  window.location="watchPDF.php?pathPDF=" + pathPDF;
}

