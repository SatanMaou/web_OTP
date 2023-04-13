<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDF</title>

    <link rel="stylesheet" href="../css/style_PDF.css" />

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
  </head>

  <body>
    <div id="show-pdf" class="container h-100">
      <div id="canvas_container">  
        <iframe src="" width="100%" height="100%"></iframe>
        <a href="#"><button type="button" class="btn btn-primary w-25 Uppercase">Tải về</button></a>
      </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <script src="../js/content.js"></script>
    <script>
      var filePDF = "<?php echo $_GET['pathPDF']; ?>";
      var hostName = location.hostname;
      $('iframe').attr('src', "https://docs.google.com/gview?url=https://"+ hostName +"/pdf/" + filePDF + "&embedded=true");
      $('a').attr("href", "https://docs.google.com/gview?url=https://"+ hostName +"/pdf/" + filePDF +"&embedded=true")
    </script>
  </body>
</html>
